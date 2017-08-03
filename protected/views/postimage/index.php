<?php
/* @var $this PostimageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postimages',
);

$this->menu=array(
	array('label'=>'Create Postimage', 'url'=>array('create')),
	array('label'=>'Manage Postimage', 'url'=>array('admin')),
);
?>

<h1>Postimages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
