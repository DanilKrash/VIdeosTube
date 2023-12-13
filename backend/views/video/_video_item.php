<?php
/** @var $model Video */

use common\models\Video;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="d-flex">
    <a href="<?php echo Url::to(['/video/update', 'id' => $model->video_id]) ?>">
        <div class="flex-shrink-0">
            <div class="ratio ratio-16x9 mr-2" style="width: 140px;">
                <video poster="<?php echo $model->getThumbnailLink() ?>"
                       src="<?php echo $model->getVideoLink() ?>"></video>
            </div>
        </div>
    </a>
    <div class="flex-grow-1 ms-3">
        <h6 class="mt-0"><?php echo $model->title ?></h6>
        <?php echo StringHelper::truncateWords($model->description, 10) ?>
    </div>
</div>
