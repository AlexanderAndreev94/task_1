<?php
/* @var $this PostController */
/* @var $model Post */
/* @var  $postImageModel Postimage*/
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
        <?php $this->widget('application.extensions.CKEditor', array(
            'model'=>$model,
            'attribute'=>'content',
            'language'=>'en',
            'editorTemplate'=>'full',
        )); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
        <?php echo $form->dropDownList($model,'category_id', CHtml::listData(Category::model()->findAll(),'id', 'title')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
        <?php
            $status = [];
            $status[0] = 0;
            $status[1] = 1;
        ?>
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status', $status); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model' => $model,
                'name'=>'pub_date',
                'attribute' => 'pub_date',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat' => 'yy-mm-dd'
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;'
                ),
        )); ?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>

    <div class="row">
        <?php
            $this->widget('CMultiFileUpload', array(
                'model' => $postImageModel,
                'name' => 'image',
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
            ));
            echo $form->error($postImageModel, 'image');
        ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->