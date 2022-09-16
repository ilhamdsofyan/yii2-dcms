<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model docotel\dcms\models\BizRule */

$this->title = Yii::t('rbac-dcms', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', 'Rules'), 'url' => ['index']];
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
