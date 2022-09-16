<?php

namespace docotel\dcms\components\bll;

use Yii;

class RouteService implements \docotel\dcms\components\bll\IRouteService
{
    private $routeProvider;

    public function __construct()
    {
        Yii::$container->setSingleton('docotel\dcms\components\dal\IRouteProvider',
            'docotel\dcms\components\dal\RouteProvider');
        $this->routeProvider = Yii::$container->get('docotel\dcms\components\dal\IRouteProvider');
    }

    public function instance()
    {
        return $this->routeProvider->instance();
    }
}
