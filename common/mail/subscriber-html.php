<?php
/** @var $channel \common\models\User */
/** @var $user \common\models\User */

?>

<p>Здравствуйте, <?php echo $channel->username ?></p>
<p>Пользователь <?php echo \common\helpers\Html::channelLink($user, true) ?> подписалься на вас</p>
<p>VideosTube поддержка</p>
