<?php

declare(strict_types=1);
$factory->define(App\ChannelServer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'cs_host' => $faker->name,
    ];
});
