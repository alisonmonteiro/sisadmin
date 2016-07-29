<?php

namespace SisAdmin\Core\Tests;

class HomeTest extends TestCase
{
    /**
     * Test the homepage controller.
     *
     * @return void
     */
    public function testIndexController()
    {
        $this->visit('/')
            ->see('SisAdmin');
    }
}
