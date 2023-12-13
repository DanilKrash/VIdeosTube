<?php

/** @var $model \common\models\Comment */

use yii\helpers\Url;

$subCommentCount = $model->getComments()->count();
?>

<div class="comment-item <?php echo $model->pinned ? 'pinned-comment' : '' ?>"
     data-parent-id="<?php echo $model->parent_id ?>" data-id="<?php echo $model->id ?>">
    <div class="media media-comment">
        <div class="flex-shrink-0">
            <a href="<?php echo Url::to(['/channel/view', 'username' => $model->createdBy->username]) ?>">
                <img width="40" src="/img/unknown user.png" alt="аватар" class="mr-3 avatar">
            </a>
        </div>
        <div class="flex-grow-1 ms-3">
            <h6 class="mt-0">

                <?php if ($model->pinned): ?>
                    <div class="pinned-text text-muted mb-1">
                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                        Закреплён пользователем
                    </div>
                <?php endif; ?>

                <?php echo \common\helpers\Html::channelLink($model->createdBy) ?>
                <small class="text-muted">
                    <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>

                    <?php if ($model->created_at !== $model->updated_at): ?>
                        (изменено)
                    <?php endif; ?>

                </small>
            </h6>
            <div class="comment-text">
                <div class="text-wrapper">
                    <?php if ($model->mention): ?>
                        <a href="<?php echo Url::to(['/channel/view', 'username' => $model->mention]) ?>">
                            <span style="cursor: pointer" class="link-primary"><?php echo '@' . $model->mention ?></span>
                        </a>
                    <?php endif; ?>
                    <?php echo $model->comment ?>
                </div>

                <div class="bottom-actions my-2">
                    <button data-action="<?php echo \yii\helpers\Url::to(['/comment/reply']) ?>"
                            class="btn btn-sm btn-light btn-reply">
                        Ответить
                    </button>
                </div>
                <div class="reply-section">

                </div>

                <?php if ($subCommentCount): ?>
                    <div class="mb-2">
                        <a href="<?php echo \yii\helpers\Url::to(['/comment/by-parent', 'id' => $model->id]) ?>"
                           class="view-sub-comments"><?php echo $subCommentCount ?> ответа</a>
                    </div>
                <?php endif; ?>

                <div class="sub-comments">

                </div>
            </div>

            <?php if ($model->belongsTo(Yii::$app->user->id) || $model->video->belongsTo(Yii::$app->user->id)): ?>
                <div class="dropdown comment-actions">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">

                        <?php if (!$model->parent_id && $model->video->belongsTo(Yii::$app->user->id)): ?>
                            <li><a class="dropdown-item item-pin-comment"
                                   data-pinned="<?php echo $model->pinned ?>"
                                   href="<?php echo \yii\helpers\Url::to(['/comment/pin', 'id' => $model->id]) ?>">
                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                    <?php if ($model->pinned): ?>
                                        Открепить
                                    <?php else: ?>
                                        Закрепить
                                    <?php endif; ?>
                                </a></li>
                        <?php endif; ?>

                        <?php if ($model->belongsTo(Yii::$app->user->id)): ?>
                            <li><a class="dropdown-item item-edit-comment" href="#"><i class="fa fa-pencil"
                                                                                       aria-hidden="true"></i>
                                    Изменить</a></li>
                        <?php endif; ?>

                        <li><a class="dropdown-item item-delete-comment"
                               href="<?php echo \yii\helpers\Url::to(['/comment/delete', 'id' => $model->id]) ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i>
                                Удалить</a></li>
                    </ul>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="media media-input">
        <div class="flex-shrink-0">
            <img width="40" src="/img/unknown user.png" alt="аватар" class="mr-3">
        </div>
        <div class="flex-grow-1 ms-3">

            <form class="comment-edit-section" method="post"
                  action="<?php echo \yii\helpers\Url::to(['/comment/update', 'id' => $model->id]) ?>">
            <textarea class="form-control"
                      name="comment"
                      placeholder="Введите комментарий"
                      rows="1"></textarea>
                <div class="action-buttons float-end mt-2">
                    <button type="button" class="btn btn-light btn-cancel">Отмена</button>
                    <button class="btn btn-primary btn-save">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
</div>
