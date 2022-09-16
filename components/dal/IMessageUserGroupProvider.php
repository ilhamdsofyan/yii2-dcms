<?php

namespace docotel\dcms\components\dal;

interface IMessageUserGroupProvider
{
    public function findByGroupId($groupId);
}
