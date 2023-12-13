<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-light bg-light shadow-sm'],
]);
$menuItems = [
    ['label' => 'Создать', 'url' => ['/video/create']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
        ]
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav m1-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>
