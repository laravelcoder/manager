<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\Filter::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
