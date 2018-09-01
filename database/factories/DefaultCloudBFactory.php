<?php

$factory->define(App\DefaultCloudB::class, function (Faker\Generator $faker) {
    return [
        "address" => $faker->name,
        "port" => $faker->name,
        "channel_server_id" => factory('App\ChannelServer')->create(),
    ];
});
