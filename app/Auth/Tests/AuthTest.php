<?php

namespace SisAdmin\Auth\Tests;

use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class AuthTest extends TestCase
{
    public function testShowLoginIfNotAuthenticated()
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

    public function testUserCanLogin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('correctpassword'),
        ]);

        // Fail
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('some@mail.com', 'email')
            ->type('correctpassword', 'password')
            ->press(trans('auth::form.login'))
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('auth.failed'));

        // Fail
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('wrongpassword', 'password')
            ->press(trans('auth::form.login'))
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('auth.failed'));


        // Fail
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type('wrongpassword', 'password')
            ->press(trans('auth::form.login'))
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('validation.filled', [
                'attribute' => trans('users::form.email')
            ]));

        // Fail
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->press(trans('auth::form.login'))
            ->dontSee(trans('dashboard::info.name'))
            ->see(trans('validation.filled', [
                'attribute' => trans('users::form.password')
            ]));

        // Success
        $this->visit('admin')
            ->see(trans('auth::form.login'))
            ->type($user->email, 'email')
            ->type('correctpassword', 'password')
            ->press(trans('auth::form.login'))
            ->see(trans('dashboard::info.name'));
    }
}
