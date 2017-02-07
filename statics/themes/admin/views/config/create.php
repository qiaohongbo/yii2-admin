<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Config */

$this->title = Yii::t('backend', 'Create Config');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
