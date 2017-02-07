<?php

/* @var $this yii\web\View */

$this->title = '系统信息';
$this->params['breadcrumbs'][] = '系统信息';
Yii::$app->db->open();
?>
<div class="index-index">

        <header class="panel-heading">系统信息</header>
        <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td>QQ交流群</td>
                <td>608230907</td>
            </tr>
            <tr>
                <td>下载地址</td>
                <td><a href="https://github.com/qiaohongbo/yii2-admin">点击下载</a></td>
            </tr>
            <tr>
                <td>Yii版本</td>
                <td><?=Yii::getVersion();?></td>
            </tr>
            <tr>
                <td>操作系统</td>
                <td><?=php_uname('s').' '.php_uname('r');?></td>
            </tr>
            <tr>
                <td>PHP版本</td>
                <td><?=PHP_VERSION;?></td>
            </tr>
            <tr>
                <td>PHP运行环境</td>
                <td><?=apache_get_version();?></td>
            </tr>
            <tr>
                <td>PHP运行方式</td>
                <td><?=PHP_SAPI;?></td>
            </tr>
            <tr>
                <td>MySQL版本</td>
                <td><?=Yii::$app->db->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);?></td>
            </tr>
            <tr>
                <td>上传附件限制</td>
                <td><?=ini_get('upload_max_filesize');?></td>
            </tr>
            <tr>
                <td>执行时间限制</td>
                <td><?=ini_get('max_execution_time');?>秒</td>
            </tr>

            </tbody>
        </table>
        </div>
        <div class="panel-heading">开发团队</div>
        <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td>版权所有</td>
                    <td>边走边乔</td>
                </tr>
                <tr>
                    <td>负责人</td>
                    <td>边走边乔</td>
                </tr>
                <tr>
                    <td>GitHub</td>
                    <td><a href="https://github.com/qiaohongbo/yii2-admin">GitHub</a></td>
                </tr>
                <tr>
                    <td>联系QQ</td>
                    <td>771405950 (边走边乔)</td>
                </tr>
                <tr>
                    <td>捐赠</td>
                    <td>如果您使用本系统而受益或者感到愉悦, 您可以扫码支付帮助它成长~ <img src="/statics/themes/admin/images/qrcode.png" alt=""></td>
                </tr>
            </tbody>
        </table>
        </div>

</div>
