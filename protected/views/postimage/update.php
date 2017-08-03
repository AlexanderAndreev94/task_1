<?php
/* @var $this PostimageController */
/* @var $model Postimage */

$this->breadcrumbs=array(
	'Postimages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Postimage', 'url'=>array('index')),
	array('label'=>'Create Postimage', 'url'=>array('create')),
	array('label'=>'View Postimage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Postimage', 'url'=>array('admin')),
);
?>

<h1>Update Postimage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>