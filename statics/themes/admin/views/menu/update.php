<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = '修改菜单';
$this->params['breadcrumbs'][] = '系统设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-update">

    <?=$this->render('_tab_menu');?>

    <?= $this->render('_form', [
        'model' => $model,
        'treeArr' => $treeArr,
    ]) ?>

</div>
