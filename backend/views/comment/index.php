<?php

use common\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\models\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Комментарии и упоминания - VideosTube Studio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1 style="font-size: 25px">Комментарии и упоминания</h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class
        ],
        'itemView' => '_item',

        'layout' => '<div class="mt-4">{items}</div>{pager}',
    ]); ?>


</div>
