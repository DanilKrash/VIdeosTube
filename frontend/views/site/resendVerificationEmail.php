<?php

/** @var yii\web\View$this  */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Повторно отправьте электронное письмо с подтверждением';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email">
    <div class="mt-5 offset-lg-3 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>Заполните вашу почту. Проверить свою почту здесь</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
