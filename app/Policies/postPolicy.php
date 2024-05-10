<?php

namespace App\Policies;

use App\Models\User;
use App\Models\posts;

class postPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, posts $post)
    {
        return $user->is_admin || $user->is_editor;
    }

    public function create(User $user)
    {
        return $user->is_admin || $user->is_editor;
    }

    public function update(User $user, posts $post)
    {
        return $user->is_admin || $user->id === $post->user_id;
    }

    public function delete(User $user, posts $post)
    {
        return $user->is_admin || $user->id === $post->user_id;
    }
}
