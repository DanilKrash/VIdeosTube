<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
              integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/> <?php $this->head() ?>
        <link rel="icon" href="<?= Yii::$app->request->baseUrl ?>/img/logo.png">
    </head>
    <body>
    <?php $this->beginBody() ?>

        <div class="warp h-100 d-flex flex-column">
            <div class="warp h-100 d-flex flex-column">
                <?php echo $this->render('_header') ?>

                <?php echo $content ?>
            </div>
        </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
