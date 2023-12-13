<aside class="shadow">
    <?php echo yii\bootstrap5\Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills',
        ],
        'encodeLabels' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-home" aria-hidden="true"></i> Главная',
                'url' => ['/video/index'],
            ],
            [
                'label' => '<i class="fa fa-history" aria-hidden="true"></i> История',
                'url' => ['/video/history'],
            ]
        ]
    ]); ?>
</aside>

