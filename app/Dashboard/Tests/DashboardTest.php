<?php

namespace SisAdmin\Dashboard\Tests;

use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class DashboardTest extends TestCase
{
    public function testIndexRoute()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('admin')
            ->see(trans('dashboard::info.name'));
    }
}
