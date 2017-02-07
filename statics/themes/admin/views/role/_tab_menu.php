<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => '角色管理',
            'url' => ['role/index'],
        ],
        [
            'label' => '添加角色',
            'url' => ['role/create'],
        ],
    ],
    'options' => ['class' => 'nav-tabs'],
]);