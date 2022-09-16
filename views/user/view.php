<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use docotel\dcms\components\Helper;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<section class="panel">
    <div class="panel-body">
        <div class="user-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?php
                if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
                    echo Html::a(Yii::t('rbac-dcms', 'Activate'), ['activate', 'id' => $model->id], [
                        'class' => 'btn btn-primary',
                        'data' => [
                            'confirm' => Yii::t('rbac-dcms', 'Are you sure you want to activate this user?'),
                            'method' => 'post',
                        ],
                    ]);
                }
                ?>
                <?php
                if (Helper::checkRoute($controllerId . 'delete')) {
                    echo Html::a(Yii::t('rbac-dcms', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                }
                ?>
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',
                    'created_at:date',
                    'status',
                ],
            ])
            ?>

        </div>
    </div>
</section>
