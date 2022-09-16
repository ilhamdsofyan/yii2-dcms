<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\AuthItem */
/* @var $context docotel\dcms\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-dcms', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
    <div class="panel-body">
        <div class="auth-item-create">
            <!-- <h1><?= Html::encode($this->title) ?></h1> -->
            <?=
            $this->render('_form', [
                'model' => $model,
            ]);
            ?>

        </div>
    </div>
</section>
