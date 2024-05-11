<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\PostPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    protected $policies = [
        Post::class => PostPolicy::class,
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::before(function ($user, $ability) {
            if ($user->is_admin) {
                return true;
            }
        });

        Gate::define('edit-post', function ($user, Post $post) {
            return $user->is_editor && $user->id === $post->user_id;
        });
    }
}
