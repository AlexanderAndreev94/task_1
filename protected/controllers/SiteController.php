<?php

class SiteController extends Controller
{
    const DEFAULT_USER_ROLE = 'user';
    const COMMENT_STATUS_ACTIVE = 1;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

    /**
     * @param int $offset
     * @param int $catId
     */
	public function actionIndex($catId = 1, $offset = 0)
	{
	    $criteria = new CDbCriteria();
	    $criteria->condition = "status=1 AND pub_date < NOW() AND category_id={$catId}";
	    $criteria->limit = 10;
	    $criteria->offset = $offset;

	    $dataProvider = new CActiveDataProvider('Post');
	    $dataProvider->criteria = $criteria;

	    if(Yii::app()->request->isAjaxRequest)
        {
            $offset += 11;
            $model = Post::model()->findAll($criteria);
            $postsJson = [];
            $i = 0;
            foreach ($model as $item)
            {
                $postsJson[$i] = ['title' => $item->title, 'pub_date' => $item->pub_date, 'offset' => $offset];
                $i++;
            }
            $enc = json_encode($postsJson);

            echo $enc;
            return;
        }
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', ['dataProvider'=> $dataProvider, 'offset' => $offset, 'catId' => $catId]);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin($username = '', $password = '')
	{
		$model=new LoginForm;

		// if it is ajax validation request
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}*/

		if(Yii::app()->request->isAjaxRequest)
        {
            if($username == '' || empty($username))
            {
                echo 'your login is empty';
                return;
            }elseif($password == '')
            {
                echo 'your password is empty';
                return;
            }else
            {

                    $model->username = $username;
                    $model->password = $password;
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login()) {
                        echo 'OK';
                    }else{
                        echo 'Your login or password is incorrect';
                    }
                return;
            }
        }
		// collect user input data

		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegister($username = '', $email = '', $password = '', $rpassword = '')
    {
        $model = new User();

        if(Yii::app()->request->isAjaxRequest)
        {
            $pattern = "/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/";
            $result = preg_match($pattern, $email);

            if($result == 0)
            {
                echo 'email is not correct';
                return;
            }
            if($password == $rpassword)
            {
                $model->username = $username;
                $model->password = md5($password);
                $model->password_salt = md5(uniqid("", true).$password);
                $model->email = $email;
                $model->datetime_registration = date('Y-m-d H:i:s');
                $model->role = self::DEFAULT_USER_ROLE;

                if($model->save())
                {
                    $mdl = new LoginForm();
                    $mdl->username = $model->username;
                    $mdl->password = $model->password;

                    if($mdl->validate() && $mdl->login())
                    {
                        echo "OK";
                        return;
                    }
                }
            }else{
                echo "passwords does not match";
                return;
            }

            return new \Exception('Model is not correct');
        }
        return new \Exception('Request is not ajax');
    }

    public function actionPost($id = 1)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "post_id={$id}";

        $model = Post::model()->findByPk($id);
        $imgModel = Postimage::model()->find($criteria);

        if($model)
        {
            $allImgs = Postimage::model()->findAll($criteria);
            return $this->render('post', ['model' => $model, 'imgModel' => $imgModel, 'allImgs' => $allImgs]);
        }
        return new \Exception('Post with such id does not exists');
    }

    public function actionAddcomment($comment = '', $userId = 0, $postId = 0)
    {
        if($userId!=0&&$postId!=0)
        {
            if(Yii::app()->request->isAjaxRequest)
            {
                $model = new Comment();

                $model->content = $comment;
                $model->user_id = $userId;
                $model->post_id = $postId;
                $model->date_created = date('Y-m-d');
                $model->status = self::COMMENT_STATUS_ACTIVE;
                
                if($model->save())
                {
                    $user = User::model()->findByPk($model->user_id);

                    $jsonEnc = ['id' => $model->user_id, 'content' => $model->content, 'date_created' => $model->date_created, 'username' => $user->username ];
                    echo json_encode($jsonEnc);
                    return;
                }else{
                    echo 'error';
                }
            }
        }
        echo 'user id or post id equals zero';
        return;
    }
}