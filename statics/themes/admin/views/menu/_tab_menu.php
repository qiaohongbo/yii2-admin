<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => '菜单管理',
            'url' => ['menu/index'],
        ],
        [
            'label' => '添加菜单',
            'url' => ['menu/create'],
        ],
    ],
    'options' => ['class' => 'nav-tabs'],
]);