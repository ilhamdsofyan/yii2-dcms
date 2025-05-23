<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\Group */

$this->title = 'Update Group: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="panel">
    <div class="panel-body">
        <div class="group-update">

            <!-- <h1><?= Html::encode($this->title) ?></h1> -->

            <?= $this->render('_form', [
                'model' => $model,
                'parent' => $parent,
                'route' => $route,
            ]) ?>

        </div>
    </div>
</section>
