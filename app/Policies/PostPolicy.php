<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->can_create == 1;
    }

    public function update(User $user, Post $post)
    {
        return $user->can_edit == 1;
    }
}
