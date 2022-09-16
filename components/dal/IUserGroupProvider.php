<?php

namespace docotel\dcms\components\dal;

interface IUserGroupProvider
{
    public function findByGroupId($groupId);
    public function deleteAllUserGroup($userId);
    public function saveUserGroup($userId, $groupId);
}
