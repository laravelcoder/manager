<?php

declare(strict_types=1);
$factory->define(App\AggregationServer::class, function (Faker\Generator $faker) {
    return [
        'server_name' => $faker->name,
        'server_host' => $faker->name,
    ];
});
