<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '角色授权';
$this->params['breadcrumbs'][] = '管理员设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <?=$this->render('_tab_menu');?>

    <?php ActiveForm::begin(); ?>
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th class="tablehead" colspan="2"><?=$this->title.': '.$role;?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($treeArr as $tree) {
            echo '<tr>';
            echo '<td><label><input type="checkbox" name="rules[]" value="'.$tree['url'].'" '.(in_array($tree['url'], $authRules) ? 'checked' : '').'> '.$tree['name'].'</label></td>
                <td></td>
            </tr>';
            if(empty($tree['_child'])) continue;
            foreach($tree['_child'] as $childs) {
                if($childs['pid'] != $tree['id']) continue;
                echo '<tr>
                <td style="padding-left: 50px;"><label><input type="checkbox" name="rules[]" value="' . $childs['url'] . '" '.(in_array($childs['url'], $authRules) ? 'checked' : '').'> ' . $childs['name'] . '</label></td>
                <td>';
                if(empty($childs['_child'])) continue;
                foreach($childs['_child'] as $child) {
                    if($child['pid'] != $childs['id']) continue;
                    echo '<label><input type="checkbox" name="rules[]" value="' . $child['url'] . '" '.(in_array($child['url'], $authRules) ? 'checked' : '').'> ' . $child['name'] . '</label>';
                }
                echo '</td>
                </tr>';
            }
        }
        ?>
        </tbody>
    </table>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>