<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '邮箱配置';
$this->params['breadcrumbs'][] = ['label' => '站点配置', 'url' => ['basic']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="config-form">
        <?=$this->render('_tab_menu');?>
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal tasi-form']]); ?>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">发送方式</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="radio" name="form[mail_type]" value="0" checked="checked"> 通过 SOCKET 连接 SMTP 服务器发送
                </div>
            </div>

            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">SMTP 服务器地址</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="text" class="form-control" name="form[smtp_server]" color="#000000" value="<?=isset($formParams['smtp_server']) ? $formParams['smtp_server'] : '';?>" >
                </div>
            </div>

            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">SMTP 端口</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="text" class="form-control" name="form[smtp_port]" color="#000000" value="<?=isset($formParams['smtp_port']) ? $formParams['smtp_port'] : '';?>" >

                </div>
            </div>
            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">SMTP 身份验证</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="radio-inline">
                        <input type="radio" name="form[auth]" value="1" <?php if(isset($formParams['auth']) && $formParams['auth'] == 1) echo 'checked';?> >是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="form[auth]" value="0" <?php if(isset($formParams['auth']) && $formParams['auth'] == 0) echo 'checked';?> >否
                    </label>
                </div>
            </div>
            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">使用SSL加密方式</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="radio-inline">
                        <input type="radio" name="form[openssl]" value="1" <?php if(isset($formParams['openssl']) && $formParams['openssl'] == 1) echo 'checked';?> >是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="form[openssl]" value="0" <?php if(isset($formParams['openssl']) && $formParams['openssl'] == 0) echo 'checked';?> >否
                    </label>
                    <?php if($supportSsl) {?>
                    <span class="help-block">您的服务器不支持ssl，请安装php扩展openssl</span><?php }?>
                </div>
            </div>
            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">邮箱用户名</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="text" class="form-control" name="form[smtp_user]" color="#000000" value="<?=isset($formParams['smtp_user']) ? $formParams['smtp_user'] : '';?>" >

                </div>
            </div>
            <div class="form-group group-smtp">
                <label class="col-sm-2 col-xs-4 control-label">邮箱密码</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="password" class="form-control" name="form[smtp_pwd]" color="#000000" value="<?=isset($formParams['smtp_pwd']) ? $formParams['smtp_pwd'] : '';?>" placeholder="输入新密码">

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">发件人邮箱</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="text" class="form-control" name="form[send_email]" color="#000000" value="<?=isset($formParams['send_email']) ? $formParams['send_email'] : '';?>" >

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">发件人昵称</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input type="text" class="form-control" name="form[nickname]" color="#000000" value="<?=isset($formParams['nickname']) ? $formParams['nickname'] : '';?>" >

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">邮件签名</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <textarea name="form[sign]" class="form-control" cols="60" rows="3"><?=isset($formParams['sign']) ? $formParams['sign'] : '';?></textarea>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label"></label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <input class="btn btn-info col-sm-12 col-xs-12" type="submit" name="submit" value="提交">
                </div>
            </div>
        <?php ActiveForm::end(); ?>

    </div>