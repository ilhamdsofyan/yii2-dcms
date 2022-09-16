<?php

namespace docotel\dcms\components;

use Yii;
use docotel\dcms\models\User;
use docotel\dcms\components\Helper;

class UserIdentity
{
    public $user;
    private $group = [];

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->setGroup();
        $this->setState();
    }

    private function setState()
    {
        $session = Yii::$app->getSession();
        $session->set('user_id', $this->user->id);
        $session->set('group_id', $this->group);
    }

    public function setGroup()
    {
        if (!empty($this->user->userGroup)) {
            foreach ($this->user->userGroup as $key => $value) {
                $this->group[] = $value->group_id;
            }
        }
        return $this;
    }

}
