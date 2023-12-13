<?php

/* @var $this \yii\web\View */
/** @var $latestVideo \common\models\Video */
/** @var $numberOfView integer */
/** @var $numberOfSubscribers integer */
/** @var $subscribers \common\models\Subscriber[] */

$this->title = 'Панель управления каналом - VideosTube Studio';
?>
<h1 style="font-size: 25px">Панель управления каналом</h1>

<div class="site-index d-flex m-4">
    <div class="card m-2" style="width: 18rem;">
        <?php if ($latestVideo): ?>
        <div class="ratio ratio-16x9 mr-2">
            <video class="embed-responsive-item"
                   poster="<?php echo $latestVideo->getThumbnailLink() ?>"
                   src="<?php echo $latestVideo->getVideoLink() ?>"></video>
        </div>
        <div class="card-body">
            <h6 class="card-title"><?php echo $latestVideo->title ?></h6>
            <p class="card-text">
                Лайков: <?php echo $latestVideo->getLikes()->count() ?><br>
                Просмотров: <?php echo $latestVideo->getViews()->count() ?>
            </p>
            <a href="<?php echo \yii\helpers\Url::to(['/video/update',
                'id' => $latestVideo->video_id]) ?>"
               class="btn btn-primary">Редактировать</a>
        </div>
        <?php else: ?>
            <div class="card-body">
                У вас нет загруженных видео
            </div>
        <?php endif; ?>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Всего просмотров:</h6>
            <p class="card-text" style="font-size: 34px">
                <?php echo $numberOfView ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Всего подписчиков:</h6>
            <p class="card-text" style="font-size: 34px">
                <?php echo $numberOfSubscribers ?>
            </p>
        </div>
    </div>
    <div class="card m-2" style="width: 14rem;">
        <div class="card-body">
            <h6 class="card-title">Последние подписчики:</h6>
            <?php foreach ($subscribers as $subscriber): ?>
                <div>
                    <?php echo $subscriber->user->username ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
