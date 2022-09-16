<?php

namespace docotel\dcms\components\bll;

use Yii;
use docotel\dcms\models\Assignment;

class AssignmentService implements \docotel\dcms\components\bll\IAssignmentService
{
    private $groupProvider;

    public function __construct()
    {
        Yii::$container->setSingleton('docotel\dcms\components\bll\IAssignmentGroupProvider',
            'docotel\dcms\components\dal\GroupProvider');

        $this->groupProvider = Yii::$container->get('docotel\dcms\components\bll\IAssignmentGroupProvider');
    }

    public function groupSearchInstance()
    {
        return $this->groupProvider->groupSearchInstance();
    }

    public function instance($id, $user = null, $config = array())
    {
        return !empty($id) ? new Assignment($id, $user, $config) : null;
    }
}
