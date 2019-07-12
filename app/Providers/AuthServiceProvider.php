<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($users) {
            return $users->roles == "SUPER";
        });

        Gate::define('manage-userfirewall', function ($users) {
            return $users->divisi == "NETWORK" || $users->divisi == "USER";
        });

        Gate::define('manage-requestfirewall', function ($users) {
            return $users->divisi == "NETWORK" || $users->divisi == "USER";
        });

        Gate::define('manage-orderlink', function ($users) {
            return $users->divisi == "NETWORK" || $users->divisi == "USER";
        });

        Gate::define('manage-requestos', function ($users) {
            return $users->divisi == "SERVER" || $users->divisi == "USER";
        });

        Gate::define('manage-requestserver', function ($users) {
            return $users->divisi == "SERVER" || $users->divisi == "USER";
        });
    }
}
