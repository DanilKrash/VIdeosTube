<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Контент на канале - VideosTube Studio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1 style="font-size: 25px">Контент на канале</h1>

    <p>
        <?= Html::a('Загрузить видео', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'content' => function($model){
                    return $this->render('_video_item', ['model' => $model]);
                }
            ],
            [
                'attribute' => 'status',
                'content' => function($model){
                    return $model->getStatusLabels()[$model->status];
                }
            ],
            //'has_thumbnail',
            //'video_name',
            'created_at:datetime',
            'updated_at:datetime',
            //'created_by',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url) {
                        return Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Удалить', $url, [
                            'data-method' => 'post',
                            'class' => 'link-dark',
                            'data-confirm' => 'Вы уверены, что хотите удалить данное видео?'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
