<?php

/**
 * Created by PhpStorm.
 * User: alexander.andreev
 * Date: 01.08.2017
 * Time: 16:33
 */
class CommentWidget extends CWidget
{
    public $postId;

    public function run()
    {
        $model = new Comment();

        $dataProvider = new CActiveDataProvider($model, ['sort'=>[
            'defaultOrder' => 'date_created DESC',
        ],]);

        if(!Yii::app()->user->isGuest)
            $this->render('comment', ['model' => $model, 'widget' => $this, 'dataProvider' => $dataProvider]);
    }
}