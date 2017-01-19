<?php

namespace App\Traits;


trait HasRole
{
    public function hasRole($role)
    {
        if (is_string($role)) {
            return in_array($role, array_pluck($this->roles->toArray(), 'role')) || false;
        }
        return false;
    }
}