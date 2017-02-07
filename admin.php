<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER', false);

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/common/config/bootstrap.php');
require(__DIR__ . '/backend/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common/config/main.php'),
    require(__DIR__ . '/common/config/main-local.php'),
    require(__DIR__ . '/backend/config/main.php'),
    require(__DIR__ . '/backend/config/main-local.php')
);

//var_dump($config);exit();
$config['components']['view'] = [
    'theme' => [
        'basePath' => '@statics/themes/admin',
        'baseUrl' => '@statics/themes/admin',
        'pathMap' => [
            '@backend/views' => [
                '@statics/themes/' . 'admin' . '/views',
            ],
        ],
    ],
];

(new yii\web\Application($config))->run();
