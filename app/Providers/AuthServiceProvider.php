<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
        //role
        Gate::define('admin', function(User $user){
           return (bool) $user->is_admin;
        });


        //permissions
        // Gate::define('idea.edit',function(User $user, Idea $idea){
        //    return ((bool) $user->is_admin || $user->id === $idea->user_id);
        // });

        // Gate::define('idea.delete',function(User $user, Idea $idea){
        //     return ((bool) $user->is_admin || $user->id === $idea->user_id);
        //  });
    }
}
