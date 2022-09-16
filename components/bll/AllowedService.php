<?php

namespace docotel\dcms\components\bll;

use Yii;
use Exception;
use docotel\dcms\components\Helper;

class AllowedService implements \docotel\dcms\components\bll\IAllowedService
{
    private $allowedProvider;
    private $routeProvider;

    public function __construct()
    {
        Yii::$container->setSingleton('docotel\dcms\components\dal\IAllowedProvider',
            'docotel\dcms\components\dal\AllowedProvider');
        Yii::$container->setSingleton('docotel\dcms\components\dal\IRouteProvider',
            'docotel\dcms\components\dal\RouteProvider');

        $this->allowedProvider = Yii::$container->get('docotel\dcms\components\dal\IAllowedProvider');
        $this->routeProvider = Yii::$container->get('docotel\dcms\components\dal\IRouteProvider');
    }

    public function routeInstance()
    {
        return $this->routeProvider->instance();
    }

    public function add($routes)
    {
        if (!empty($routes) && is_array($routes)) {
            foreach ($routes as $route) {
                try {
                    if (substr($route, 0, 1) == '/') {
                        $route = substr($route, 1);
                    }
                    $this->allowedProvider->add($route);
                } catch (Exception $exc) {
                    Yii::error($exc->getMessage(), __METHOD__);
                }
            }
            Helper::invalidate();
        }
    }

    public function remove($routes)
    {
        if (!empty($routes) && is_array($routes)) {
            foreach ($routes as $route) {
                try {
                    $this->allowedProvider->remove($route);
                } catch (Exception $exc) {
                    Yii::error($exc->getMessage(), __METHOD__);
                }
            }
            Helper::invalidate();
        }
    }
}
