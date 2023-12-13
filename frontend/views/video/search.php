<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Найденные видео - '. Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Результаты поиска</h1>
<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap5\LinkPager::class,
    ],
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>
