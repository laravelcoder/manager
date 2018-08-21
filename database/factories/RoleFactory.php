<?php

declare(strict_types=1);
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});
