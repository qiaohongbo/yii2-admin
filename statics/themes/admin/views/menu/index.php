<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Menu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '后台菜单管理';
$this->params['breadcrumbs'][] = '系统设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?=$this->render('_tab_menu');?>

    <?php ActiveForm::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterPosition' => GridView::FILTER_POS_FOOTER,
        'layout' => '{items}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'sort',
            [
                'attribute' => 'sort',
                'label' => '排序',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::textInput('sort['.$data['id'].']', $data['sort'], ['class' => 'wd35']);
                }
            ],
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            //'pid',
            //'name',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'label' => '菜单名称',
            ],
            'url:url',
            [
                'attribute' => 'icon_style',
                'label' => '图标样式',
            ],
            [
                'attribute' => 'display',
                'format' => 'raw',
                'label' => '是否显示',
                'value' => function($data) {
                    return Html::tag('span', Menu::getDisplayText($data['display']), ['class' => 'label label-sm '.Menu::getDisplayStyle($data['display'])]);
                }
            ],

            [
                'class' => 'common\grid\ActionColumn',
                'header' => Yii::t('backend', 'Operate'),
                'template' => '{create} {update} {delete}',
                'buttons' => [
                    'create' => function ($url, $model, $key) {
                        return Html::a('<span class="fa fa-plus"></span> 添加子菜单', ['create', 'pid' => $key], [
                            'title' => '添加子菜单',
                            'class' => 'btn btn-success btn-xs'
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <div class="form-group"><?=Html::submitButton('排序', ['class' => 'btn btn-info']) ?></div>
    <?php ActiveForm::end(); ?>
</div>
