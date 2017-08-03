<?php
/* @var $model Post */
/* @var $imgModel Postimage */
/* @var $allImgs array */
?>
<div style="text-align: right">
    <div><?php echo 'Publication date: '.$model->pub_date; ?></div>
</div>

<div>
    <center><h1><?php echo $model->title; ?></h1></center>
</div>
<div>
    <center>
        <div>
            <?php

                foreach ($allImgs as $img)
                {
                    echo '<a href="/test/images/upload/'.$img->image.'" data-type="image" data-fancybox data-caption="Caption">
                            <img src="/test/images/upload/'.$img->image.'" width="250" />
                          </a>';
                }
            ?>
        </div>
    </center>
</div>
<div style="text-align: justify">
    <div>
        <?php echo $model->content; ?>
    </div>
</div>
<div class="comments">
    <?php
        $this->widget('application.extensions.comments.CommentWidget', ['postId' => $model->id]);
    ?>
</div>

