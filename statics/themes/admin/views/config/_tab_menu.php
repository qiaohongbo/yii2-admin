<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => '基本配置',
            'url' => ['config/basic'],
        ],
        [
            'label' => '邮箱配置',
            'url' => ['config/send-mail'],
        ],
        [
            'label' => '附件配置',
            'url' => ['config/attachment'],
        ],
    ],
    'options' => ['class' => 'nav-tabs'],
]);