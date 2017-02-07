<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = ['label' => '管理员设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <?=$this->render('_tab_menu');?>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['id' => 'grid'],
        'filterPosition' => GridView::FILTER_POS_FOOTER,
        'layout' => '{items} {pager}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            /*[
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'id',
            ],*/
            'username',
            'email:email',
            [
                'attribute' => 'last_login_ip',
                'value' => function ($data) {
                    return long2ip($data->last_login_ip);
                }
            ],
            'last_login_time:datetime',
            [
                'attribute' => 'user_role',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::tag('span', $data->getGroup(), ['class' => 'label label-sm label-info']);
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::tag('span', $data->getStatus(), ['class' => 'label label-sm '.$data->getStatusStyle()]);
                }
            ],

            [
                'class' => 'common\grid\ActionColumn',
                'header' => Yii::t('backend', 'Operate'),
                'template' => '{update} {auth} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<?php //echo Html::a('批量删除', "javascript:void(0);", ['class' => 'btn btn-success gridview']);?>
</div>
<?php
$this->registerJs('
    $(".gridview").on("click", function () {
        var keys = $("#grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
');
?>