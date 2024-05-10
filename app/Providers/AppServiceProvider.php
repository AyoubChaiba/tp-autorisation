<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\posts;
use App\Policies\postPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        posts::class => postPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->is_admin) {
                return true;
            }
        });

        Gate::define('edit-posts', function ($user, posts $post) {
            return $user->is_editor && $user->id === $post->user_id;
        });
    }
}
