<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Article $article)
    {
        return $user->is_admin || $user->is_editor;
    }

    public function create(User $user)
    {
        return $user->is_admin || $user->is_editor;
    }

    public function update(User $user, Article $article)
    {
        return $user->is_admin || $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article)
    {
        return $user->is_admin || $user->id === $article->user_id;
    }
}
