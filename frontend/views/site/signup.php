<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="mt-5 offset-lg-3 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>Заполните все поля ниже, чтобы создать аккаунт:</p>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
