<?php

namespace SisAdmin\Users\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use SisAdmin\Users\Entities\User;
use SisAdmin\Users\Repositories\UserRepository;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        UserRepository::create([
            'name' => 'Nil Késede',
            'email' => 'nil@briba.com.br',
            'password' => bcrypt('piramide'),
            'active' => true,
            'role' => 1,
            'expires_date' => null,
        ]);

        factory(User::class, 8)->create();

        Model::reguard();
    }
}
