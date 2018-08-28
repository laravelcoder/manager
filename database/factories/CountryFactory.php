<?php

declare(strict_types=1);
$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'shortcode' => $faker->name,
        'title' => $faker->name,
    ];
});
