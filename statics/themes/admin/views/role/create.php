<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = '添加角色';
$this->params['breadcrumbs'][] = ['label' => '管理员设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">

    <?=$this->render('_tab_menu');?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
