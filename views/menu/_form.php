<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use docotel\dcms\models\Menu;
use docotel\dcms\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => 50]) ?>
            <?php echo $form->field($model, 'description')->textarea(['rows' => 4]) ?>
            <?php
                echo Html::submitButton(
                    empty($model->menu_type) ? Yii::t('rbac-dcms', 'Create') : Yii::t('rbac-dcms', 'update'),
                    ['class' => empty($model->menu_type) ? 'btn btn-success' : 'btn btn-primary'])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
