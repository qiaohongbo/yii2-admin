<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => '数据库管理',
            'url' => ['database/export'],
        ],
        [
            'label' => '数据库导入',
            'url' => ['database/import'],
        ],
    ],
    'options' => ['class' => 'nav-tabs'],
]);