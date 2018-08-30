<?php

declare(strict_types=1);
$factory->define(App\Cso::class, function (Faker\Generator $faker) {
    return [
        'channel_server_id' => factory('App\ChannelServer')->create(),
        'channel_id' => factory('App\ChannelsList')->create(),
        'ocloud_a' => $faker->name,
        'ocp_a' => $faker->randomNumber(2),
        'ocloud_b' => $faker->name,
        'ocp_b' => $faker->name,
    ];
});
