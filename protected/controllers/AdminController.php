<?php

class AdminController extends Controller
{
	public function actionIndex()
	{
        $categDataProvider=new CActiveDataProvider('Category');
        $postDataProvider=new CActiveDataProvider('Post');
        $commDataProvider=new CActiveDataProvider('Comment');

        $records=array_merge($categDataProvider->data , $postDataProvider->data, $commDataProvider->data);

        $provAll = new CArrayDataProvider($records,
            array(
                'sort' => array( //optional and sortring
                    'attributes' => array(
                        'id',
                        'title'
                    ),
                ),
                'pagination' => array('pageSize' => 10) //optional add a pagination
            )
        );

        $this->render('index', ['dataProvider' => $provAll]);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}