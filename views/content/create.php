<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\DclFieldDataBody */

$this->title = Yii::t('app', 'Create Dcl Field Data Body');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dcl Field Data Bodies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcl-field-data-body-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
