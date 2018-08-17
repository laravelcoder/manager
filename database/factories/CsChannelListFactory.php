<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\CsChannelList::class, function (Faker\Generator $faker) {
    return [
        'channel_server_id' => factory('App\ChannelServer')->create(),
        'channel_name' => $faker->name,
        'channel_type' => $faker->name,
    ];
});
