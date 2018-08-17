<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\VideoServerType::class, function (Faker\Generator $faker) {
    return [
        'server_type' => $faker->name,
    ];
});
