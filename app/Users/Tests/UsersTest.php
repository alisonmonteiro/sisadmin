<?php

namespace SisAdmin\Users\Tests;

use SisAdmin\Core\Tests\TestCase;
use SisAdmin\Users\Entities\User;
use SisAdmin\Users\Repositories\UserRepository;

class UsersTest extends TestCase
{
    private $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new UserRepository();
    }

    /**
     * Test if users can be retrieved.
     *
     * @return void
     */
    public function testUsersCanBeRetrieved()
    {
        $users = factory(User::class, 13)->create();

        $userRetrieved = $this->user->latest()->first();

        $this->assertEquals($users[0]->name, $userRetrieved->name);
        $this->assertEquals($users[0]->email, $userRetrieved->email);

        $allUsers = $this->user->all();

        $this->assertEquals($users[3]->name, $allUsers[3]->name);
        $this->assertEquals($users[6]->email, $allUsers[6]->email);
    }
}
