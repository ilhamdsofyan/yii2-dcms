<?php

use yii\helpers\Html;
use yii\grid\GridView;
use docotel\dcms\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel docotel\dcms\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-dcms', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
    <div class="panel-body">
        <?php echo Html::a(Yii::t('rbac-dcms', 'Create'), ['/dcms/user/create'], ['class' => 'btn btn-primary']) ?>
        <div class="user-index">

            <!-- <h1><?= Html::encode($this->title) ?></h1> -->

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    [
                        'attribute' => 'created_at',
                        'value' => function($model) {
                            return date('d-m-Y', $model->created_at);
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function($model) {
                            return $model->status == 0 ? 'Inactive' : 'Active';
                        },
                        'filter' => [
                            0 => 'Inactive',
                            10 => 'Active'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        // 'template' => Helper::filterActionColumn(['view', 'update' 'activate', 'delete']),
                        'template' => '{view} {update} {activate} {delete}',
                        'buttons' => [
                            'activate' => function($url, $model) {
                                if ($model->status == 10) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('rbac-dcms', 'Activate'),
                                    'aria-label' => Yii::t('rbac-dcms', 'Activate'),
                                    'data-confirm' => Yii::t('rbac-dcms', 'Are you sure you want to activate this user?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                            }
                            ]
                        ],
                    ],
                ]);
                ?>
        </div>
    </div>
</section>
