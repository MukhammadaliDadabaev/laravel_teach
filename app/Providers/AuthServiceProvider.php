<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // //---> 1-usul USER-ROLENI TEKSHIRISH
        // Gate::define('create-post', function (User $user) {
        //     return $user->hasRole('blogger');
        // });

        //---> 2-usul USER-ROLENI TEKSHIRISH
        Gate::define('create-post', function (User $user, Role $role) {
            return $user->hasRole($role->name);
        });

        // Gate::define('delete-post', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}
