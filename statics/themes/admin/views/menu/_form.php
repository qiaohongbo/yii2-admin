<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->dropDownList([0 => '一级菜单']+$treeArr, ['encode' => false]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->hint('格式: index/index&id=2&type=1') ?>

    <?= $form->field($model, 'icon_style')->textInput(['maxlength' => true])->hint('格式为: 图标样式, 例如: icon-comment') ?>

    <?= $form->field($model, 'display')->radioList($model->getDisplays()) ?>

    <?= $form->field($model, 'sort')->textInput()->hint('数值越小排序越前') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
