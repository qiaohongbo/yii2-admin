<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers', //控制器默认命名空间
    'bootstrap' => ['log'],
    'modules' => [],    //模块
    'defaultRoute' => 'index/index',   //默认路由
    'layout' => 'main',//布局文件 优先级: 控制器>配置文件>系统默认
    //组件
    'components' => [
        //request组件
        'request' => [
            'csrfParam' => '_csrf-backend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'EJBy8WRohzpqJY7BTurjQaft2NV-g1cA',
        ],
        //身份认证类
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['index/login'], //配置登录url
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            //'db' => 'db',   //数据库连接的应用组件ID,默认为'db'
            //'sessionTable' => '', //session数据表名,默认为'session'
        ],
        //Rbac权限控制
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'index/error',
        ],
        //
        /*'urlManager' => [
            'enablePrettyUrl' => true,  //开启url规则
            'showScriptName' => false,  //是否显示url中的index.php
            'suffix' => '.html',    //后缀
            'rules' => [
            ],
        ],*/
    ],
    'params' => $params,
];
