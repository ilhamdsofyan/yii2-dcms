<?php

namespace docotel\dcms\components;

use Yii;
use yii\helpers\Html;

class ActionHelper
{
    public static function menu($model)
    {
        $link = '';
        if (!empty($model)) {
            $link = Html::a(Yii::t('rbac-dcms', 'Create'), ['/dcms/menu/create']);
        }
        return $link;
    }
}
