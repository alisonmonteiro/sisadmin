<?php

namespace SisAdmin\Auth\Providers;

use Illuminate\Auth\Passwords\PasswordResetServiceProvider as ServiceProvider;
use SisAdmin\Auth\PasswordBroker;

class PasswordResetServiceProvider extends ServiceProvider
{
    /**
     * Register the password broker instance.
     *
     * @return void
     */
    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            $tokens = $app['auth.password.tokens'];

            $users = $app['auth']->driver()->getProvider();

            $view = $app['config']['auth.password.email'];

            return new PasswordBroker($tokens, $users, $app['mailer'], $view);
        });
    }
}
