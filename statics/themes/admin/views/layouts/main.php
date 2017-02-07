<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\web\AssetBundle as AppAsset;
use common\widgets\Alert;
use backend\models\Menu;

AppAsset::register($this);
$allMenus = Menu::getMenu();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->params['basic']['sitename'].' - '.Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/statics/themes/admin/css/style.css" rel="stylesheet">
<body>
<?php $this->beginBody() ?>

<div class="left-side sticky-left-side">

    <div class="logo">
        <a href="index.html"><img src="/statics/themes/admin/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.html"><img src="/statics/themes/admin/images/logo_icon.png" alt=""></a>
    </div>

    <div class="left-side-inner">

        <ul class="nav nav-pills nav-stacked custom-nav">
            <?php
            foreach ($allMenus as $menus) {
            ?>
            <li class="menu-list">
                <a href="<?=Url::to([$menus['url']]);?>">
                    <i class="fa <?=$menus['icon_style'];?>"></i>
                    <span><?=$menus['name'];?></span>
                </a>
                <ul class="sub-menu-list">
                    <?php
                    if(!isset($menus['_child'])) break;
                    foreach ($menus['_child'] as $menu) {
                        $menuArr = explode('/', $menu['url']);
                    ?>
                    <li class="<?=Yii::$app->controller->id == $menuArr[0] ? 'active' : '';?>"><a href="<?=Url::to([$menu['url']]);?>"> <?=$menu['name'];?></a></li>
                    <?php }?>
                </ul>
            </li>
            <?php
            }
            ?>
            <!--<li class="menu-list">
                <a href="">
                    <i class="fa fa-edit"></i>
                    <span><?=Yii::t('backend', 'Content Manage');?></span>
                </a>
                <ul class="sub-menu-list">
                    <li><a href=""> 内容管理</a></li>
                    <li><a href=""> 栏目列表</a></li>
                    <li><a href=""> 模型管理</a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="">
                    <i class="fa fa-users"></i>
                    <span><?=Yii::t('backend', 'User Set');?></span>
                </a>
                <ul class="sub-menu-list">
                    <li><a href=""> 用户管理</a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="">
                    <i class="fa fa-hdd-o"></i>
                    <span><?=Yii::t('backend', 'Data Backup');?></span>
                </a>
                <ul class="sub-menu-list">
                    <li><a href=""> 备份数据</a></li>
                    <li><a href=""> 还原数据</a></li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="">
                    <i class="fa fa-picture-o"></i>
                    <span><?=Yii::t('backend', 'Themes');?></span>
                </a>
                <ul class="sub-menu-list">
                    <li><a href=""> 主题管理</a></li>
                    <li><a href=""> 模板管理</a></li>
                </ul>
            </li>-->

        </ul>

    </div>
</div>

<div class="main-content" >

    <div class="header-section">
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="fa fa-dedent"></i>',
        'brandOptions' => ['class' => 'toggle-btn'],
        'brandUrl' => '#',
        'renderInnerContainer' => false,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    //搜索
    $leftMenuItems = ['<li>'
            . Html::beginForm('/index/search', 'post', ['class' => 'searchform'])
            . Html::textInput('keyword', '', ['class' => 'form-control', 'placeholder' => 'Search here...'])
            . Html::endForm()
            . '</li>'
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftMenuItems,
    ]);

    $menuItems = [];
    if (!\Yii::$app->user->isGuest) {
        $menuItems[] = '<li class="dropdown notification-menu">'
            . '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/statics/themes/admin/images/user-avatar.png" alt="" />'
            . Yii::$app->user->identity->username
            . '<span class="caret"></span></a>'
            . '<ul class="dropdown-menu dropdown-menu-usermenu pull-right" role="menu">'
            . '<li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>'
            . '<li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>'
            . '<li>'
            . Html::beginForm(['/index/logout'], 'post')
            . Html::submitButton(
                '<i class="fa fa-sign-out"></i> '.Yii::t('backend', 'Log Out'),
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</ul>'
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    </div>

    <div class="page-heading">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
    <?= Alert::widget() ?>
    <div class="wrapper">
        <div class="panel">
            <div class="panel-body">
            <?= $content ?>
            </div>
        </div>
    </div>

</div>

<?php $this->endBody() ?>
<script src="/statics/themes/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/statics/themes/admin/js/jquery.nicescroll.js"></script>
<script src="/statics/themes/admin/js/scripts.js"></script>
</body>
</html>
<?php $this->endPage() ?>
