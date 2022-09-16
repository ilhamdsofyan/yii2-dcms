<?php

namespace docotel\dcms\components\bll;

interface IAllowedService
{
    public function routeInstance();
    public function add($route);
    public function remove($route);
}