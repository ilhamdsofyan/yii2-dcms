<?php

namespace docotel\dcms\components\dal;

interface IResetProvider
{
    public function findByPasswordResetToken($token);
}
