<aside class="shadow">
    <?php echo yii\bootstrap5\Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills',
        ],
        'encodeLabels' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-columns" aria-hidden="true"></i> Панель управления',
                'url' => ['/site/index'],
            ],
            [
                'label' => '<i class="fa fa-play" aria-hidden="true"></i> Видео',
                'url' => ['/video/index'],
            ],
            [
                'label' => '<i class="fa fa-commenting" aria-hidden="true"></i> Комментарии',
                'url' => ['/comment/index'],
            ],
        ]
    ]); ?>
</aside>