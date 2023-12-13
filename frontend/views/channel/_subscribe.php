<?php
/**
 * @var $channel \common\models\User */

use yii\helpers\Url;

?>

<?php if ($channel->isSubscribed(Yii::$app->user->id)): ?>
    <a class="btn btn-secondary"
       href="<?php echo Url::to(['channel/subscribe', 'username' => $channel->username]) ?>"
       data-method="post" data-pjax="1">
        Отписаться <i class="fa fa-bell-slash" aria-hidden="true"></i></a> <?php echo $channel->getSubscribers()->count() ?> подписчиков
<?php else: ?>
    <a class="btn btn-danger"
       href="<?php echo Url::to(['channel/subscribe', 'username' => $channel->username]) ?>"
       data-method="post" data-pjax="1">
        Подписаться <i class="fa fa-bell" aria-hidden="true"></i></a> <?php echo $channel->getSubscribers()->count() ?> подписчиков
<?php endif;