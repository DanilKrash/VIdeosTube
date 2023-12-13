<?php

/** @var $this \yii\web\View */
/** @var $model \common\models\Comment */

?>

<div style="justify-content: space-between; margin: 0 30px 0 30px" class="d-flex">
    <div style="width: 500px;" class="comment-wrapper">

        <?php echo $this->render('_comment_item', [
                'model' => $model
        ]) ?>

    </div>

    <div style="width: 500px;" class="video-wrapper">
        <?php echo $this->render('@backend/views/video/_video_item', [
            'model' => $model->video
        ]) ?>
    </div>
</div>