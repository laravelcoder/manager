<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => str_random(10),
        'remember_token' => $faker->name,
    ];
});
