<?php

namespace docotel\dcms\components\bll;

use Yii;
use yii\helpers\ArrayHelper;

class GroupService implements \docotel\dcms\components\bll\IGroupService
{
    private $groupProvider;
    private $routeProvider;

    public function __construct()
    {
        Yii::$container->setSingleton('docotel\dcms\components\bll\IGroupProvider',
            'docotel\dcms\components\dal\GroupProvider');
        Yii::$container->setSingleton('docotel\dcms\components\bll\IRouteProvider',
            'docotel\dcms\components\dal\RouteProvider');

        $this->groupProvider = Yii::$container->get('docotel\dcms\components\bll\IGroupProvider');
        $this->routeProvider = Yii::$container->get('docotel\dcms\components\bll\IRouteProvider');

    }

    public function groupInstance()
    {
        return $this->groupProvider->groupInstance();
    }

    public function groupSearchInstance()
    {
        return $this->groupProvider->groupSearchInstance();
    }

    public function getSavedRoutes()
    {
        return $this->routeProvider->instance()->getSavedRoutes();
    }

}
