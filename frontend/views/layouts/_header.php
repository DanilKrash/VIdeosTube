<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use common\helpers\Html;

/** @var $model \common\models\Video */

NavBar::begin([
    'brandLabel' => '<img style="margin-right: 5px" width="28" src="/img/logo.png"> VideosTube',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-light bg-light shadow-sm'],
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
} else {
    $menuItems[] = ['label' => 'Мой канал', 'url' => ['/channel/view', 'username' => Yii::$app->user->identity->username]];
    $menuItems[] = [
        'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
        ]
    ];
}
?>
    <form style="margin-right: 250px" action="<?php echo Url::to(['/video/search']) ?>" class="d-flex">
        <input style="width: 500px;" class="form-control me-2" type="search" placeholder="Введите запрос"
               name="keyword" value="<?php echo Yii::$app->request->get('keyword') ?>">
        <button class="btn btn-outline-success">Найти</button>
    </form>
<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav m1-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>
