<?php

use yii\helpers\Html;
use yii\grid\GridView;
use docotel\dcms\components\RouteRule;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel docotel\dcms\models\searchs\AuthItem */
/* @var $context docotel\dcms\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-dcms', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<section class="panel">
    <div class="panel-body">
        <div class="role-index">
            <!-- <h1><?= Html::encode($this->title) ?></h1> -->
            <p>
                <?= Html::a(Yii::t('rbac-dcms', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('rbac-dcms', 'Name'),
                    ],
                    [
                        'attribute' => 'ruleName',
                        'label' => Yii::t('rbac-dcms', 'Rule Name'),
                        'filter' => $rules
                    ],
                    [
                        'attribute' => 'description',
                        'label' => Yii::t('rbac-dcms', 'Description'),
                    ],
                    ['class' => 'yii\grid\ActionColumn',],
                ],
            ])
            ?>

        </div>
    </div>
</section>
