<?php
/**
 * Created by PhpStorm.
 * User: alexander.andreev
 * Date: 01.08.2017
 * Time: 16:35
 */

/* @var $model Comment */
/* @var $widget CWidget*/
/* @var $dataProvider */

?>

<div class="commentContainer" style="width: 100%">
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_comment',
    ));
    ?>
</div>

<?php $form = $widget->beginWidget('CActiveForm', [
    'id' => 'commentForm',
     'action' => 'index.php?r=comment/create',
]);
?>


<div class="row">
    <?php
        echo $form->textArea($model, 'content', ['rows' => 6, 'style' => 'width:100%;', 'id' => 'commentArea']);
        echo $form->error($model, 'content');
    ?>
</div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Comment', ['id' => 'addComment']); ?>
</div>

<?php $widget->endWidget(); ?>