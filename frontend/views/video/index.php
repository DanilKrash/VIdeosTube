<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'VideosTube';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap5\LinkPager::class,
    ],
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap justify-content-center">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>
