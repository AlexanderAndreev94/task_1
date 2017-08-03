<?php
/* @var $data Comment */
    $usr = new User();
    $usr = $usr->findByPk($data->user_id);
?>

<div class="view">

    <b id="uid" uid=<?='"'.$data->user_id.'"' ?> ><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($usr->username), array('view', 'id'=>$data->id), ['pid'=>$data->id, 'id' => 'postId']); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
    <?php echo CHtml::encode($data->date_created); ?>
    <br />


</div>