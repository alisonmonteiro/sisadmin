<?php

namespace SisAdmin\Users\Tests;

use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;

class UsersTest extends TestCase
{
    /**
     * Test if users can be retrieved.
     *
     * @return void
     */
    public function testUsersCanBeRetrieved()
    {
        $users = factory(User::class, 13)->create();

        $userRetrieved = User::latest()->first();

        $this->assertEquals($users[0]->name, $userRetrieved->name);
        $this->assertEquals($users[0]->email, $userRetrieved->email);

        $allUsers = User::all();

        $this->assertEquals($users[3]->name, $allUsers[3]->name);
        $this->assertEquals($users[6]->email, $allUsers[6]->email);
    }
}
