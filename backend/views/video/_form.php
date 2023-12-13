<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */

\backend\assets\TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-sm-8">

            <?php echo $form->errorSummary($model) ?>

            <?= $form->field($model, 'title')->textarea(['maxlength' => true, 'rows' => 2, 'cols' => 5]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <label><?php echo $model->getAttributeLabel('thumbnail') ?></label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    <label class="input-group-text" for="thumbnail">Изображение</label>
                </div>
            </div>

            <?= $form->field($model, 'tags', [
                    'inputOptions' => ['data-role' => 'tagsinput']
            ])->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-sm-4">

            <div class="embed-responsive embed-responsive-4by3 mb-3">
                <video style="width: 352px;" class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>" src="<?php echo $model->getVideoLink() ?>"
                       controls></video>
            </div>
            <br>
            <div>
                <div class="mb-1">
                    <div class="text-muted">Ссылка на видео:</div>
                    <a href="<?php echo $model->getVideoLink() ?>">
                        Открыть видео
                    </a>
                </div>
            </div>

            <div>
                <div class="mb-3">
                    <div class="text-muted">Название видео:</div>
                    <?php echo $model->video_name ?>
                </div>
            </div>

            <div style="width: 50%;">
                <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
