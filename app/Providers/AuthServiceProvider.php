<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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

        Gate::define('manage_library',function($user){
            return $user->hasAnyPermission([
                'library_show',
                'library_create',
                'library_update',
                'library_detail',
                'library_delete'
            ]);
        });

        Gate::define('manage_data',function($user){
            return $user->hasAnyPermission([
                    'data_show',
                    'data_create',
                    'data_update',
                    'data_detail',
                    'data_delete'
            ]);
        });

        Gate::define('manage_users',function($user){
            return $user->hasAnyPermission([
                    'user_show',
                    'user_create',
                    'user_update',
                    'user_detail',
                    'user_delete'
            ]);
        });

        Gate::define('manage_roles',function($user){
            return $user->hasAnyPermission([
                    'role_show',
                    'role_create',
                    'role_update',
                    'role_detail',
                    'role_delete'
            ]);
        });
    }
}
