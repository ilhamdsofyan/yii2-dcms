<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\Message */

$this->title = Yii::t('rbac-dcms', 'Update {modelClass}: ', [
    'modelClass' => 'Message',
]) . $model->message_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->message_id, 'url' => ['view', 'id' => $model->message_id]];
$this->params['breadcrumbs'][] = Yii::t('rbac-dcms', 'Update');
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
