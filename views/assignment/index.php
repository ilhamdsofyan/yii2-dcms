<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel docotel\dcms\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-dcms', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    'name',

];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}'
];
?>
<section class="panel">
    <div class="panel-body">
        <div class="assignment-index">

        <!-- <h1><?= Html::encode($this->title) ?></h1> -->

        <?php Pjax::begin(); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns,
        ]);
        ?>
        <?php Pjax::end(); ?>

        </div>
    </div>
</section>
