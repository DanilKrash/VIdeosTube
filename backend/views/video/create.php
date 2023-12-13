<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Загрузить видео';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 style="padding: 20px"><?= Html::encode($this->title) ?></h1>

<div class="video-create">

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon">
            <i class="fa fa-upload" aria-hidden="true"></i>
        </div>
        <br>

        <p>Перетащите файлы сюда или нажмите кнопку ниже, чтобы выбрать их на компьютере.</p>
        <p class="text-muted">Пока вы не опубликуете видео, доступ к ним будет ограничен.</p>

        <?php $form = \yii\bootstrap5\ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
        ]) ?>

        <?php echo $form->errorSummary($model) ?>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <button style="color: #000; font-weight: bold" class="btn btn-primary btn-file">
                    Выберите файл
                    <input type="file" id="videoFile" name="video">
                </button>
            </div>
        <?php \yii\bootstrap5\ActiveForm::end() ?>
    </div>
</div>
