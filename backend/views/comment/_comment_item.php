<?php

/** @var $model \common\models\Comment */
/** @var $this \yii\web\View */

?>
<div class="media media-comment comment-item mb-2" data-id="<?php echo $model->id ?>">
    <div class="flex-shrink-0">
        <img width="40" src="/img/unknown user.png" alt="аватар" class="mr-3 avatar">
    </div>
    <div class="flex-grow-1 ms-3">
        <h6 class="mt-0">
            <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
            <small class="text-muted">
                <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>

                <?php if ($model->created_at !== $model->updated_at): ?>
                    (изменено)
                <?php endif; ?>

            </small>
        </h6>
        <div class="comment-text">
            <div class="text-wrapper d-flex mb-4 align-items-center">
                <?php if ($model->mention): ?>
                    <span style="cursor: pointer; margin-right: 5px" class="link-primary"><?php echo '@' . $model->mention ?></span>
                <?php endif; ?>
                <?php echo $model->comment ?>

                <div class="media bottom-actions">
                    <div class="btn-group comment-actions">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">

                            <li><a class="dropdown-item item-delete-comment"
                                   href="<?php echo \yii\helpers\Url::to(['/comment/delete', 'id' => $model->id]) ?>"><i
                                            class="fa fa-trash" aria-hidden="true"></i>
                                    Удалить</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="reply-section">

            </div>
            <div class="sub-comments">
                <?php foreach ($model->comments as $comment): ?>
                    <?php echo $this->render('_comment_item', ['model' => $comment]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
