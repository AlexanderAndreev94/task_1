<?php
/* @var $this PostimageController */
/* @var $model Postimage */

$this->breadcrumbs=array(
	'Postimages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Postimage', 'url'=>array('index')),
	array('label'=>'Manage Postimage', 'url'=>array('admin')),
);
?>

<h1>Create Postimage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>