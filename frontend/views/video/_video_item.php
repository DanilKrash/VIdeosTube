<?php

/** @var $model \common\models\Video */

use common\helpers\Html;
use yii\helpers\Url;

?>

<div class="card m-3" style="width: 20rem; border: none">
    <a href="<?php echo Url::to(['/video/view', 'id' => $model->video_id]) ?>">
        <div class="ratio ratio-16x9">
            <video style="border-radius: 15px" poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>"></video>
        </div>
    </a>
    <div class="card-body p-2">
        <h6 class="card-title m-0"><?php echo $model->title ?></h6>
        <p class="text-muted card-text m-0"><?php echo Html::channelLink($model->createdBy) ?></p>
        <p class="text-muted card-text m-0"><?php echo $model->getViews()->count() ?> просмотров • <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></p>
    </div>
</div>