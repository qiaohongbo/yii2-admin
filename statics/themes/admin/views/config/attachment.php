<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '附件配置';
$this->params['breadcrumbs'][] = ['label' => '站点配置', 'url' => ['basic']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .watermark_pos td{border: 1px solid #e5e1dd; padding: 10px 22px;}
    .watermark_pos label{font-weight: 400;}
</style>
    <div class="config-form">
        <?=$this->render('_tab_menu');?>
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal tasi-form']]); ?>

            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">附件上传路径</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="control-label">/uploadfile</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">允许上传附件大小</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group pull-left">
                    <input type="text" value="<?=isset($formParams['attachment_size']) ? $formParams['attachment_size'] : '';?>" class="form-control" name="form[attachment_size]" size="100">
                </div>
                <div class="col-sm-4 col-xs-10"><span class="help-block"><i class="fa fa-info-circle"></i> KB</span></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">允许上传附件类型</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group pull-left">
                    <input type="text" value="<?=isset($formParams['attachment_suffix']) ? $formParams['attachment_suffix'] : '';?>" class="form-control" name="form[attachment_suffix]" size="100">
                </div>
                <div class="col-sm-4 col-xs-10"><span class="help-block"><i class="fa fa-info-circle"></i> 多个用英文"|"隔开</span></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">图片水印设置</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="radio-inline">
                        <input type="radio" name="form[watermark_enable]" value="1" <?php if(isset($formParams['watermark_enable']) && $formParams['watermark_enable'] == 1) echo 'checked';?>>图片水印
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="form[watermark_enable]" value="2" <?php if(isset($formParams['watermark_enable']) && $formParams['watermark_enable'] == 2) echo 'checked';?>>文字水印
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="form[watermark_enable]" value="0" <?php if(isset($formParams['watermark_enable']) && $formParams['watermark_enable'] == 0) echo 'checked';?>>关闭水印
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">图片水印位置</label>
                <div class="col-lg-5 col-sm-6 col-xs-8 input-group">
                    <table class="watermark_pos">
                        <tr><td colspan="3" align="center">
                                <label><input type="radio" name="form[watermark_pos]" value="0" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 0) echo 'checked';?>> 随机</label></td></tr>
                        <tr>
                            <td><label><input type="radio" name="form[watermark_pos]" value="1" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 1) echo 'checked';?>> 顶端居左</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="2" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 2) echo 'checked';?>> 顶端居中</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="3" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 3) echo 'checked';?>> 顶端居右</label></td>
                        </tr>
                        <tr>
                            <td><label><input type="radio" name="form[watermark_pos]" value="4" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 4) echo 'checked';?>> 中部居左</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="5" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 5) echo 'checked';?>> 中部居中</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="6" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 6) echo 'checked';?>> 中部居右</label></td>
                        </tr>
                        <tr>
                            <td><label><input type="radio" name="form[watermark_pos]" value="7" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 7) echo 'checked';?>> 底端居左</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="8" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 8) echo 'checked';?>> 底端居中</label></td>
                            <td><label><input type="radio" name="form[watermark_pos]" value="9" <?php if(isset($formParams['watermark_pos']) && $formParams['watermark_pos'] == 9) echo 'checked';?>> 底端居右</label></td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">文字水印内容</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group"><input type="text" class="form-control " name="form[watermark_text]" value="<?=isset($formParams['watermark_text']) ? $formParams['watermark_text'] : '';?>"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">文字水印字体文件</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="control-label">/common/libs/fonts/watermark.ttf
                    <?php if(!file_exists(Yii::getAlias('@webroot/common/libs/fonts/watermark.ttf'))) echo '<br><font color="red">字体文件不存在,请上传,或者使用图片水印</font> ';?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">图片水印文件地址</label>
                <div class="col-lg-3 col-sm-4 col-xs-4 input-group">
                    <label class="control-label">/statics/images/watermark.png
                    <?php if(!file_exists(Yii::getAlias('@webroot/statics/images/watermark.png'))) echo '<br><font color="red">图片水印文件不存在,请上传</font> ';?>
                    </label>
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