<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></b>
    <?php echo '<a href="index.php?r=site/post&id='.$data->id.'">'.CHtml::encode($data->title).'</a>' ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
    <?php echo CHtml::encode($data->pub_date); ?>
    <br />

</div>