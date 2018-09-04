<?php

declare(strict_types=1);
$factory->define(App\DefaultCloudA::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->name,
        'port' => $faker->name,
        'channel_server_id' => factory('App\ChannelServer')->create(),
    ];
});
