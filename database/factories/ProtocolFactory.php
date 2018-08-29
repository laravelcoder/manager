<?php

declare(strict_types=1);
$factory->define(App\Protocol::class, function (Faker\Generator $faker) {
    return [
        'protocol' => $faker->name,
        'real_name' => $faker->name,
    ];
});
