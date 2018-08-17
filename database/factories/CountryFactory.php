<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'shortcode' => $faker->name,
        'title' => $faker->name,
    ];
});
