<?php

namespace SisAdmin\Auth\Tests;

use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class AuthTest extends TestCase
{
    public function testShowLoginPageIfNotAuthenticated()
    {
        $this->visit('admin')
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('auth::info.name'));
    }

    public function testUserAlreadyAuthenticated()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('admin/auth')
            ->dontSee(trans('auth::info.name'))
            ->see(trans('dashboard::info.name'));
    }

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

    public function testUserCanLogin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correctpassword'),
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
}
