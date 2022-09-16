<?php

namespace docotel\dcms\components\dal;

use docotel\dcms\models\Route;

class RouteProvider implements \docotel\dcms\components\dal\IRouteProvider
{
    public function instance()
    {
        return new Route();
    }
}
