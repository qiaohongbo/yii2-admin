<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\Func;

$this->title = '数据库管理';
$this->params['breadcrumbs'][] = ['label' => '数据库设置', 'url' => ['basic']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="database-index">

    <?=$this->render('_tab_menu');?>
    <?php ActiveForm::begin(); ?>
    <table class="table table-striped table-advance table-hover">
    <thead>
    <thead>
    <tr>
        <th class="tablehead"><input type="checkbox"  id="check_box" onclick="checkall('selectAll',this);"> 全选</th>
        <th class="tablehead">表名</th>
        <th class="tablehead">类型</th>
        <th class="tablehead">编码</th>
        <th class="tablehead">记录数</th>
        <th class="tablehead">使用空间</th>
        <th class="tablehead">碎片</th>
        <th class="tablehead">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($infos as $info) { ?>
    <tr>
        <td><input type="checkbox" name="tables[]" value="<?php echo $info['name']?>"></td>
        <td><?php echo $info['name'];?></td>
        <td><?php echo $info['engine'];?></td>
        <td><?php echo $info['collation'];?></td>
        <td><?php echo $info['rows'];?></td>
        <td><?php echo Func::sizeCount($info['data_length'] + $info['index_length']);?></td>
        <td><?php echo Func::sizeCount($info['data_free']);?></td>
        <td>
            <?=Html::a('优化', ['repair-opt', 'operation' => 'optimize', 'tables' => $info['name']], [
                            'title' => '优化',
                            'class' => 'btn btn-primary btn-xs'
                        ]);?>
            <?=Html::a('修复', ['repair-opt', 'operation' => 'repair', 'tables' => $info['name']], [
                            'title' => '优化',
                            'class' => 'btn btn-info btn-xs'
                        ]);?>
        </td>
    </tr>
    <?php }?>
    </tbody>
    </table>
    <div class="form-group"><?=Html::submitButton('备份', ['class' => 'btn btn-info']) ?></div>
    <?php ActiveForm::end(); ?>

</div>

<script>
    /**
     * 全选/反选
     * @param value selectAll或空
     * @param obj 当前对象
     */
    function checkall(value,obj)  {
        var form=document.getElementsByTagName("form")
        for(var i=0;i<form.length;i++){
            for (var j=0;j<form[i].elements.length;j++){
                if(form[i].elements[j].type=="checkbox"){
                    var e = form[i].elements[j];
                    if (value=="selectAll"){e.checked=obj.checked}
                    else{e.checked=!e.checked;}
                }
            }
        }
    }
</script>