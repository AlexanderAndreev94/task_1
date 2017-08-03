<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin',
);

$this->menu=array(
    array('label'=>'Categories', 'url'=>'/test/index.php?r=category/index'),
    array('label'=>'Posts', 'url'=>'/test/index.php?r=post/index'),
    array('label'=>'Comments', 'url'=>'/test/index.php?r=comment/index'),
);?>
<div class="rMenu" style="float: right; width: 170px;">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
    'title'=>'Operations',
));
$this->widget('zii.widgets.CMenu', array(
    'items'=>$this->menu,
    'htmlOptions'=>array('class'=>'operations'),
));
$this->endWidget();
?>
</div>

<h1>Admin</h1>
