<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<main class="d-flex" role="main">
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/img/logo.html" type="image/x-icon">
    <?php echo $this->render('_sidebar') ?>

    <div style="width: 100%;" class="container-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endContent(); ?>
