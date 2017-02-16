<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '基本配置';
$this->params['breadcrumbs'][] = ['label' => '站点配置', 'url' => ['basic']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="config-form">
        <?=$this->render('_tab_menu');?>
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal tasi-form']]); ?>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">网站名称</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group pull-left">
                    <input type="text" class="form-control" name="form[sitename]" value="<?=isset($formParams['sitename']) ? $formParams['sitename'] : '';?>">
                </div>
                <div class="col-sm-4 col-xs-10"><span class="help-block"><i class="fa fa-info-circle"></i> 一般不超过80个字符</span></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">网站域名</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <input type="text" class="form-control" name="form[url]" value="<?=isset($formParams['url']) ? $formParams['url'] : '';?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">网站logo</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <input type="text" class="form-control" name="form[logo]" value="<?=isset($formParams['logo']) ? $formParams['logo'] : '';?>">
                    <!-- <div class="input-group"></div> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">SEO关键字</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group pull-left">
                    <input type="text" class="form-control" name="form[seo_keywords]" value="<?=isset($formParams['seo_keywords']) ? $formParams['seo_keywords'] : '';?>">
                </div>
                <div class="col-sm-4 col-xs-10"><span class="help-block"><i class="fa fa-info-circle"></i> 一般不超过100个字符，关键词用英文逗号隔开</span></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">SEO描述</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group pull-left">
                    <input type="text" class="form-control" name="form[seo_description]" value="<?=isset($formParams['seo_description']) ? $formParams['seo_description'] : '';?>">
                </div>
                <div class="col-sm-4 col-xs-10"><span class="help-block"><i class="fa fa-info-circle"></i> 一般不超过200个字符</span></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">版权信息</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <textarea name="form[copyright]" class="form-control" cols="60" rows="3"><?=isset($formParams['copyright']) ? $formParams['copyright'] : '';?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">访问统计代码</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <textarea name="form[statcode]" class="form-control" cols="60" rows="3"><?=isset($formParams['statcode']) ? $formParams['statcode'] : '';?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">关闭网站</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <label class="radio-inline">
                        <input type="radio" name="form[close]" value="1" <?php if(isset($formParams['close']) && $formParams['close'] == 1) echo 'checked';?>>是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="form[close]" value="0" <?php if(isset($formParams['close']) && $formParams['close'] == 0) echo 'checked';?>>否
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label">关闭原因</label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <textarea name="form[close_reason]" class="form-control" cols="60" rows="3"><?=isset($formParams['close_reason']) ? $formParams['close_reason'] : '';?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-xs-4 control-label"></label>
                <div class="col-lg-4 col-sm-6 col-xs-6 input-group">
                    <input class="btn btn-info col-sm-12 col-xs-12" type="submit" name="submit" value="提交">
                </div>
            </div>
        <?php ActiveForm::end(); ?>

    </div>