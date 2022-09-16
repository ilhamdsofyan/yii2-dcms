<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this  yii\web\View */
/* @var $model docotel\dcms\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel docotel\dcms\models\searchs\BizRule */

$this->title = Yii::t('rbac-dcms', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
    <div class="panel-body">
        <div class="role-index">

            <!-- <h1><?= Html::encode($this->title) ?></h1> -->

            <p>
                <?= Html::a(Yii::t('rbac-dcms', 'Create Rule'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['class' => 'yii\grid\ActionColumn',],
                ],
            ]);
            ?>

        </div>
    </div>
</section>
