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
}
