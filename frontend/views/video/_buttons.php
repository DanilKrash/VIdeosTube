<?php
/** @var $model \common\models\Video*/

use yii\helpers\Url;

?>
<div style="border-radius: 30px" class="border">
    <a href="<?php echo Url::to(['/video/like', 'id' => $model->video_id]) ?>"
       class="btn <?php echo $model->isLikedBy(Yii::$app->user->id) ? 'btn-outline-primary': 'fa fa-thumbs-o-up' ?>"
       data-method="post" data-pjax="1" style="border: none">
        <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo $model->getLikes()->count() ?>
    </a>
    |
    <a href="<?php echo Url::to(['/video/dislike', 'id' => $model->video_id]) ?>"
       class="btn <?php echo $model->isDislikedBy(Yii::$app->user->id) ? 'btn-outline-primary': 'fa fa-thumbs-o-down' ?>"
       data-method="post" data-pjax="1" style="border: none">
        <i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $model->getDislikes()->count() ?>
    </a>
</div>
