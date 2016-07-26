<?php

namespace SisAdmin\Dashboard\Tests;

use SisAdmin\Core\Tests\TestCase;

class DashboardTest extends TestCase
{
    public function testIndexRoute()
    {
        $this->visit('admin')
            ->see(trans('dashboard::info.name'));
    }
}
