<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
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

        Gate::define('users', function($user){
            return DB::table('users_permissions')->where([
                'user_id' => $user->id,
                'permission_id' => 1
            ])->exists();
        });

        Gate::define('clients', function($user){
            return DB::table('users_permissions')->where([
                'user_id' => $user->id,
                'permission_id' => 2
            ])->exists();
        });

        Gate::define('features', function($user){
            return DB::table('users_permissions')->where([
                'user_id' => $user->id,
                'permission_id' => 3
            ])->exists();
        });
        
    }
}
