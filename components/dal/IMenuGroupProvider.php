<?php

namespace docotel\dcms\components\dal;

interface IMenuGroupProvider
{
    public function getAllGroup($order = 'group_id');
}
