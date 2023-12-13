<?php

/** @var $this \yii\web\View */
/** @var $model \common\models\Video */
/** @var $similarVideos \common\models\Video[] */

/** @var $comments \common\models\Comment[] */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title . ' - VideosTube';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-8">
        <div class="ratio ratio-16x9">
            <video style="border-radius: 10px; background-color: black" class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink() ?>" controls></video>
        </div>
        <h5 class="mt-2"><?php echo $model->title ?></h5>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p>
                    <a href="<?php echo Url::to(['/channel/view', 'username' => $model->createdBy->username]) ?>"><img width="40" class="mr-3" src="/img/unknown user.png" alt="канал"></a>
                    <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
                </p>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                <?php echo $this->render('_buttons', [
                    'model' => $model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>

        <div style="background: #f1f1f1; display: flex; flex-direction: column; border-radius: 15px; padding: 10px; margin-top: 10px">
            <div>
                <?php echo $model->getViews()->count() ?>
                просмотров
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
            </div>
            <div>
                <?php echo Html::encode($model->description) ?>
            </div>
            <div style="margin-top: 20px">
                #<?php echo Html::encode($model->tags) ?>
            </div>
        </div>
        <div class="comments mb-4 mt-4">
            <h4 class="mb-3"><span id="comment-count"><?php echo $model->getComments()->count() ?></span> комментариев</h4>
            <div class="create-comment mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img width="40" src="/img/unknown user.png" alt="аватар" class="mr-3">
                    </div>
                    <div class="flex-grow-1 ms-3">

                        <form class="create-comment-form" method="post"
                              action="<?php echo Url::to(['/comment/create', 'id' => $model->video_id ]) ?>">
                            <input type="hidden" name="video_id" value="<?php echo $model->video_id ?>">
                            <textarea class="form-control" name="comment" placeholder="Введите комментарий"
                                      rows="1"></textarea>
                            <div class="action-buttons float-end mt-2">
                                <button type="button" class="btn btn-light btn-cancel">Отмена</button>
                                <button class="btn btn-primary btn-save">Оставить комментарий</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div id="comments-wrapper" class="comments-wrapper">
                <?php foreach ($comments as $comment) {
                    echo $this->render('_comment_item', [
                        'model' => $comment,
                    ]);
                } ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <?php foreach ($similarVideos as $similarVideo): ?>
            <div class="d-flex mb-3">
                <a href="<?php echo Url::to(['/video/view', 'id' => $similarVideo->video_id]) ?>">
                    <div class="ratio ratio-16x9 mr-2" style="width: 200px;">
                        <video style="border-radius: 10px" class="embed-responsive-item"
                               poster="<?php echo $similarVideo->getThumbnailLink() ?>"
                               src="<?php echo $similarVideo->getVideoLink() ?>"></video>
                    </div>
                </a>
                <div class="flex-grow-1 ms-3">
                    <h6 class="m-0"><?php echo $similarVideo->title ?></h6>
                    <div class="text-muted">
                        <p class="m-0">
                            <?php echo \common\helpers\Html::channelLink($similarVideo->createdBy) ?>
                        </p>
                        <small>
                            <?php echo $similarVideo->getViews()->count() ?> просмотров •
                            <?php echo Yii::$app->formatter->asRelativeTime($similarVideo->created_at) ?>
                        </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

