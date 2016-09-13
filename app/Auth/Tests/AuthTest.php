<?php

namespace SisAdmin\Auth\Tests;

use Carbon\Carbon;
use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class AuthTest extends TestCase
{
    /**
     * User must be redirected to login form.
     *
     * @return void
     */
    public function testShowLoginPageIfNotAuthenticated()
    {
        $this->visit('admin')
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('auth::info.name'));
    }

    /**
     * Users already authenticated must be redirected to dashboard.
     *
     * @return void
     */
    public function testUserAlreadyAuthenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('admin/auth')
            ->dontSee(trans('auth::info.name'))
            ->see(trans('dashboard::info.name'));
    }

    /**
     * The email field must be valid on login form.
     *
     * @return void
     */
    public function testEmailMustBeValid()
    {
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('somepassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('validation.filled', [
                'attribute' => trans('auth::form.email'),
            ]));

        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('some', 'email')
            ->type('somepassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('validation.email', [
                'attribute' => trans('auth::form.email'),
            ]));
    }

    /**
     * The password field might not be empty
     *
     * @return void
     */
    public function testPasswordMustBeFilled()
    {
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('some@email.com', 'email')
            ->press(trans('auth::form.login'))
            ->see(trans('validation.filled', [
                'attribute' => trans('auth::form.password'),
            ]));
    }

    /**
     * The users must be able to login through the form.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correctpassword'),
            'active' => true,
            'expires_date' => Carbon::now()->addDay(1),
        ]);

        // Fail for wrong password
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('wrongpassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('auth.failed'));

        // Success
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('correctpassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('dashboard::info.name'));
    }

    /**
     * Users may need to reset their password.
     *
     * @return void
     */
    public function testResetPassword()
    {
        $user = factory(User::class)->create([
            'email' => 'nil@briba.com.br',
        ]);

        $this->visit('admin/auth/password/email')
            ->see(trans('auth::form.reset'))
            ->type($user->email, 'email')
            ->press(trans('auth::form.send'));
    }
}
