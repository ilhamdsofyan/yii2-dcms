<?php

namespace docotel\dcms\components\dal;

use docotel\dcms\models\Group;
use docotel\dcms\models\searchs\Group as GroupSearch;

class GroupProvider implements
    \docotel\dcms\components\dal\IGroupProvider,
    \docotel\dcms\components\dal\IAssignmentGroupProvider,
    \docotel\dcms\components\dal\IMenuGroupProvider
{
    public function groupInstance()
    {
        return new Group();
    }

    public function groupSearchInstance()
    {
        return new GroupSearch();
    }

    public function getAllGroup($order = 'group_id')
    {
        return Group::find()->orderBy($order)->all();
    }

    public function searchGroup($group = null)
    {
        return Group::find()->andFilterWhere(['like', 'name', $group])->all();
    }
}
