<?php

namespace SisAdmin\Users\Database\Seeders;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use SisAdmin\Users\Entities\User;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->insert([
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
