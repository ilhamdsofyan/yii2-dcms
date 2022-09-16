<?php

namespace docotel\dcms\components\dal;

interface IAllowedProvider
{
    public function add($route);
    public function remove($route);
}