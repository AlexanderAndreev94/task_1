<?php
/* @var $this PostimageController */
/* @var $model Postimage */

$this->breadcrumbs=array(
	'Postimages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Postimage', 'url'=>array('index')),
	array('label'=>'Create Postimage', 'url'=>array('create')),
	array('label'=>'Update Postimage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Postimage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Postimage', 'url'=>array('admin')),
);
?>

<h1>View Postimage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'post_id',
	),
)); ?>
