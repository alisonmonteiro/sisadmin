<?php

namespace SisAdmin\Auth\Tests;

use Carbon\Carbon;
use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class AuthTest extends TestCase
{
    /**
     * Redirect to the login form if the user isn't authenticated.
     *
     * @return void
     */
    public function testUserNotAuthenticated()
    {
        $this->visit('admin')
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('auth::info.name'));
    }

    /**
     * Users already authenticated must be redirected
     * to dashboard or to the intended page.
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
     * The email field must be filled.
     *
     * @return void
     */
    public function testEmailMustBeFilled()
    {
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('somepassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('validation.filled', [
                'attribute' => trans('auth::form.email'),
            ]));
    }

    /**
     * The email field must contain a valid email address.
     *
     * @return void
     */
    public function testEmailMustBeValid()
    {
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
     * The password field must not be blank.
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
     * The user account must be active.
     *
     * @return void
     */
    public function testUserMustBeActive()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correctpassword'),
            'active' => false,
            'expires_date' => Carbon::now()->addDay(1),
        ]);

        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('correctpassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('auth::form.failed'));
    }

    /**
     * The user's validation date must not be expired.
     *
     * @return void
     */
    public function testUserMustNotBeExpired()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correctpassword'),
            'active' => true,
            'expires_date' => Carbon::yesterday(),
        ]);

        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('correctpassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('auth::form.failed'));
    }

    /**
     * To login into the application the user account
     * must be active the validation date must not be expired
     * and enter a correct password on the form.
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
            ->see(trans('auth::form.failed'));

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
