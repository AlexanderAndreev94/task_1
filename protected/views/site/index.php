<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider*/
/* @var $offset int*/
/* @var $catId int*/
$this->pageTitle=Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile('/test/js/nextten/next.js');
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<center><h2>Posts list</h2></center>
<div class="wrapper">
    <div class="postContainer" style="float: left; width: 70%">
        <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',   // refers to the partial view named '_post'
                'sortableAttributes'=>array(
                    'title',
                    'create_time'=>'Post Time',
                ),
            ));
        ?>
        <div class="nextBtnContainer">
            <div class="next" style="text-align: center; margin-top: 10px;">
                <?php
                    echo CHtml::button('Next 10', ['id' => 'nextButton', 'catId' => $catId, 'offset' => $offset]);
                ?>
            </div>
        </div>
    </div>
    <div class="cateMenu" style="float: left; width: 25%; margin-left: 20px">
        <?php
            $this->widget('application.extensions.categTree.CategoryTree', ['offset' => $offset]);
        ?>
    </div>
</div>
