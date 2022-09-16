<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\YiiAsset;
use docotel\dcms\AnimateAsset;

/* @var $this yii\web\View */
/* @var $model docotel\dcms\models\Assignment */
/* @var $fullnameField string */

$userName = $model->group_id;

/* not being used bcause assigment based on group
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
*/
$userName = Html::encode($userName);


$this->title = Yii::t('rbac-dcms', 'Assignment') . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-dcms', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

AnimateAsset::register($this);
YiiAsset::register($this);

$opts = Json::htmlEncode([
        'items' => $model->getItems($model->group_id)
    ]);

$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<section class="panel">
    <div class="panel-body">
        <div class="assignment-index">
            <h1><?= $this->title ?></h1>

            <div class="row">
                <div class="col-sm-5">
                    <input class="form-control search" data-target="avaliable"
                           placeholder="<?= Yii::t('rbac-dcms', 'Search for avaliable') ?>">
                    <select multiple size="20" class="form-control list" data-target="avaliable">
                    </select>
                </div>
                <div class="col-sm-1">
                    <br><br>
                    <?= Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => (string)$model->group_id], [
                        'class' => 'btn btn-success btn-assign',
                        'data-target' => 'avaliable',
                        'title' => Yii::t('rbac-dcms', 'Assign')
                    ]) ?><br><br>
                    <?= Html::a('&lt;&lt;' . $animateIcon, ['revoke', 'id' => (string)$model->group_id], [
                        'class' => 'btn btn-danger btn-assign',
                        'data-target' => 'assigned',
                        'title' => Yii::t('rbac-dcms', 'Remove')
                    ]) ?>
                </div>
                <div class="col-sm-5">
                    <input class="form-control search" data-target="assigned"
                           placeholder="<?= Yii::t('rbac-dcms', 'Search for assigned') ?>">
                    <select multiple size="20" class="form-control list" data-target="assigned">
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
