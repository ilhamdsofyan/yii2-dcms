<?php

namespace docotel\dcms\components\bll;

interface IAssignmentService
{
    public function groupSearchInstance();
    public function instance($id, $user = null, $config = array());
}
