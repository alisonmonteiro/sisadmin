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

    public function testUsersCanBeRetrieved()
    {
        $users = factory(User::class, 13)->create();

        $userRetrieved = $this->user->latest()->first();

        $this->assertEquals($userRetrieved->name, $users[0]->name);
        $this->assertEquals($userRetrieved->email, $users[0]->email);

        $allUsers = $this->user->all();

        $this->assertEquals($allUsers[3]->name, $users[3]->name);
        $this->assertEquals($allUsers[6]->email, $users[6]->email);
    }
}
