<?php

declare(strict_types=1);
$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});
