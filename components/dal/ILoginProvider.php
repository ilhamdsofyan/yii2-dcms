<?php

namespace docotel\dcms\components\dal;

interface ILoginProvider
{
    public function findByUsername($username);
}
