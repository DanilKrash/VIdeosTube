<?php
/**
 * @var $this \yii\web\View
 * @var $channel \common\models\User
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use yii\helpers\Url;

$this->title = $channel->username . ' - VideosTube';
$this->params['breadcrumbs'][] = $this->title;

?>

<div style="background: #e7e7e7; padding: 50px" class="jumbotron">
    <div style="display: flex; align-items: center">
        <img style="margin-right: 20px" width="160" src="/img/unknown user.png" alt="channel">
        <h1 class="display-4"><?php echo $channel->username ?></h1>
    </div>
    <hr class="my-4">
    <?php \yii\widgets\Pjax::begin() ?>
    <?php echo $this->render('_subscribe', [
        'channel' => $channel
    ]) ?>
    <?php \yii\widgets\Pjax::end() ?>
</div>

<?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '@frontend/views/video/_video_item',
        'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
        'itemOptions' => [
             'tag' => false
        ]
]) ?>
