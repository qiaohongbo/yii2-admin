<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = '添加菜单';
$this->params['breadcrumbs'][] = '系统设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?=$this->render('_tab_menu');?>

    <?= $this->render('_form', [
        'model' => $model,
        'treeArr' => $treeArr,
    ]) ?>

</div>
