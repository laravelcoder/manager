<?php

declare(strict_types=1);
$factory->define(App\VideoServerType::class, function (Faker\Generator $faker) {
    return [
        'server_type' => $faker->name,
    ];
});
