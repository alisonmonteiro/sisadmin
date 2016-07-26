<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;

$factory->define(\SisAdmin\Users\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'active' => collect([true, false])->random(),
        'role' => collect([1, 2])->random(),
        'expires_date' => collect([
            null,
            Carbon::now(),
            Carbon::now()->addWeeks(2),
            Carbon::now()->addWeeks(3),
        ])->random(),
        'remember_token' => str_random(10),
    ];
});
