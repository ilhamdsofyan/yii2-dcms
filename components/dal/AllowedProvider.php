<?php

namespace docotel\dcms\components\dal;

use Yii;
use docotel\dcms\models\Allowed;

class AllowedProvider implements \docotel\dcms\components\dal\IAllowedProvider
{
    public function add($route)
    {
        if (!empty($route)) {
            $model = new Allowed();
            $model->allowed = $route;
            return $model->save();
        }
        return false;
    }

    public function remove($route)
    {
        if (!empty($route)) {
            return Allowed::deleteAll(['allowed' => $route]);
        }
        return false;
    }

}
