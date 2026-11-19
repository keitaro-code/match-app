<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Auth\StringTokenGuard;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Auth::extend('string-token', function ($app, $name, $config) {
            $guard = new StringTokenGuard(
                $app['auth']->createUserProvider($config['provider'] ?? null),
                $app['request'],
                $config['input_key'] ?? 'api_token',
                $config['storage_key'] ?? 'api_token',
                $config['hash'] ?? false
            );
            $app->refresh('request', $guard, 'setRequest');

            return $guard;
        });
    }
}
