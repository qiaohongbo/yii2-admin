<?php
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

BootstrapAsset::register($this);

$this->title = '管理员登录';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/statics/themes/admin/css/style.css" rel="stylesheet">
</head>

<body class="login-body">
<?php $this->beginBody() ?>

<div class="container">
    <?= Alert::widget() ?>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-signin'],
    ]);?>

    <div class="form-signin-heading text-center">
        <h1 class="sign-title">Sign In</h1>
        <img src="/statics/themes/admin/images/login-logo.png" alt=""/>
    </div>
    <div class="login-wrap">
        <?= $form->field($model, 'username', ['template' => '<div class="form-group field-loginform-password required">{input}{hint}{error}</div>'])->textInput(['autofocus' => true, 'placeholder' => '用户名']) ?>
        <?= $form->field($model, 'password', ['template' => '<div class="form-group field-loginform-password required">{input}{hint}{error}</div>'])->passwordInput(['placeholder' => '密码']) ?>
        <?= Html::submitButton('<i class="fa fa-check"></i>', ['class' => 'btn btn-lg btn-login btn-block', 'name' => 'login-button']) ?>

        <label class="checkbox"><?= $form->field($model, 'rememberMe')->checkbox() ?></label>

    </div>
    <?php ActiveForm::end();?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
