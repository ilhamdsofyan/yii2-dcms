<?php

namespace docotel\dcms\components\bll;

interface IMenuLayoutService
{
    public function getMenuCache($type = 'backend-menu');
}
