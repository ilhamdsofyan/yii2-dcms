<?php

namespace docotel\dcms\components\dal;

use docotel\dcms\models\UserGroup;

class UserGroupProvider implements 
    \docotel\dcms\components\dal\IUserGroupProvider,
    \docotel\dcms\components\dal\IMessageUserGroupProvider
{
    public function findByGroupId($groupId)
    {
        return UserGroup::findAll($groupId);
    }

    public function deleteAllUserGroup($userId)
    {
        return UserGroup::deleteAll('user_id = :id', [':id' => $userId]);
    }

    public function saveUserGroup($userId, $groupId)
    {
        $group = new UserGroup();
        $group->user_id = $userId;
        $group->group_id = $groupId;
        return $group->save();
    }
}
