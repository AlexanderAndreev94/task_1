<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></b>
    <?php echo CHtml::link(CHtml::encode($data->title), ['site/post', 'id'=>$data->id]); ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
    <?php echo CHtml::encode($data->pub_date); ?>
    <br />

</div>