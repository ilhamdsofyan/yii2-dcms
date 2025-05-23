<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\AuthItem */
/* @var $context docotel\dcms\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-dcms', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('rbac-dcms', 'Update');
?>
<section class="panel">
    <div class="panel-body">
        <div class="auth-item-update">
            <!-- <h1><?= Html::encode($this->title) ?></h1> -->
            <?=
            $this->render('_form', [
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</section>
