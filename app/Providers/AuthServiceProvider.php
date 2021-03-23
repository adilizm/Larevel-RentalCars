<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Foundation\Auth\User ;
use  App\Models\User;
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
        
       Gate::define('is_owner', function (User $user) {
            return $user->Fonction === 'owner';
        });

        Gate::define('is_admin', function (User $user) {
            return in_array( $user->Fonction ,['owner','admin'] );
        });

        Gate::define('is_manager', function (User $user) {
            return  $user->Fonction ==='manager';
        });

        Gate::define('is_worker', function (User $user) {
            return $user->Fonction === 'delivery_man';
        });
    }
}
