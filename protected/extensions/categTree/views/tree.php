<?php
/**
 * Created by PhpStorm.
 * User: alexander.andreev
 * Date: 03.08.2017
 * Time: 10:41
 */

/* @var  $menu array*/



$this->beginWidget('zii.widgets.CPortlet', array(
    'title'=>'Operations',
));
$this->widget('zii.widgets.CMenu', array(
    'items'=>$menu,
    'htmlOptions'=>array('class'=>'operations'),
));
$this->endWidget();
?>