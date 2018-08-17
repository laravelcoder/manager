<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\Protocol::class, function (Faker\Generator $faker) {
    return [
        'protocol' => $faker->name,
        'real_name' => $faker->name,
    ];
});
