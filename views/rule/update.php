<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model docotel\dcms\models\BizRule */

$this->title = Yii::t('rbac-dcms', 'Update Rule') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', 'Rules'), 'url' => ['index']];
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
