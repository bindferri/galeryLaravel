<?php

namespace Api\Galery\Policies;


use Api\Users\Models\User;

class GaleryPolicy
{
    public function checkOwner(User $user, $ownerId)
    {
        return $user->id === $ownerId;
    }
}
