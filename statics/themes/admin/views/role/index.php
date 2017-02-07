<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '角色管理';
$this->params['breadcrumbs'][] = '管理员设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <?=$this->render('_tab_menu');?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterPosition' => GridView::FILTER_POS_FOOTER,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'label' => '角色名称'
            ],
            [
                'attribute' => 'description',
                'label' => '描述'
            ],
            [
                'attribute' => 'createdAt',
                'label' => '添加时间',
                'value' => function($data) {
                    return date('Y-m-d H:i:s', $data->createdAt);
                }
            ],
            [
                'attribute' => 'updatedAt',
                'label' => '更新时间',
                'value' => function($data) {
                    return date('Y-m-d H:i:s', $data->updatedAt);
                }
            ],

            [
                'class' => 'common\grid\ActionColumn',
                'header' => Yii::t('backend', 'Operate'),
                'template' => '{update} {auth} {delete}',
            ],
        ],
    ]); ?>

</div><!-- index -->
