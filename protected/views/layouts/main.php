<?php /* @var $this Controller */
$cs = Yii::app()->clientScript;
$cs->registerScriptFile('/test/js/reload/reloadPage.js');
$cs->registerScriptFile('/test/js/login/login.js');
$cs->registerScriptFile('/test/js/comment/comment.js');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="/test/assets/fancybox/jquery.fancybox.min.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>'#', 'linkOptions' => ['onclick' => '$("#loginDialog").dialog("open"); return false;'], 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Registration', 'url'=>'#', 'linkOptions' => ['onclick'=>'$("#regDialog").dialog("open"); return false;'], 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Admin', 'url'=>array('/admin/index'), 'visible' => Yii::app()->user->checkAccess('administrator')),
			),
		));

        ///Registration
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
            'id'=>'regDialog',
            // additional javascript options for the dialog plugin
            'options'=>array(
                'title'=>'Registration',
                'autoOpen'=>false,
            ),
        ));

        $model = new User();
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
            'focus'=>array($model,'firstName'),
        )); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username', ['id'=>'username']); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?><br/>
            <?php echo $form->textField($model,'email', ['id'=>'email']); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->textField($model,'password', ['id'=>'password']); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'password_repeat'); ?>
            <?php echo $form->textField($model,'password', ['id'=>'password_repeat']); ?>
            <?php echo $form->error($model,'password_repeat'); ?>
        </div>
        <div class="validation"></div>


        <?php
        echo CHtml::submitButton('Register', ['id' => 'regButton']);
       // echo CHtml::ajaxSubmitButton('Register', 'index.php?r=site/register');
        $this->endWidget();

        $this->endWidget('zii.widgets.jui.CJuiDialog');

        ///Registration end

        ///Login
         $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'loginDialog',
            // additional javascript options for the dialog plugin
            'options'=>array(
            'title'=>'Login',
            'autoOpen'=>false,
        ),
        ));
        $mdl = new LoginForm();
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
            'focus'=>array($mdl,'firstName'),
        )); ?>

        <?php echo $form->errorSummary($mdl); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($mdl,'username'); ?>
        <?php echo $form->textField($mdl,'username', ['id' => 'lusername']); ?>
        <?php echo $form->error($mdl,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($mdl,'password'); ?>
        <?php echo $form->passwordField($mdl,'password', ['id' => 'lpassword']); ?>
        <?php echo $form->error($mdl,'password'); ?>

    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($mdl,'rememberMe'); ?>
        <?php echo $form->label($mdl,'rememberMe'); ?>
        <?php echo $form->error($mdl,'rememberMe'); ?>
    </div>
        <div class="validation"></div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Login',['id'=>'loginButton']); ?>
    </div>
    <?php
        $this->endWidget();

        $this->endWidget('zii.widgets.jui.CJuiDialog');

        /// Login end
        ?>

	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
<script type="text/javascript" src="/test/assets/fancybox/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    var $= jQuery.noConflict();
</script>
</html>
