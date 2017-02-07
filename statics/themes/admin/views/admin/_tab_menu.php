<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => '管理员管理',
            'url' => ['admin/index'],
        ],
        [
            'label' => '添加管理员',
            'url' => ['admin/create'],
        ],
    ],
    'options' => ['class' => 'nav-tabs'],
]);