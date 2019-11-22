<?php

namespace App\Services;

use App\User;

class BaseService
{
    protected $user;

    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
