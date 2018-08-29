<?php

$factory->define(App\SsListChannel::class, function (Faker\Generator $faker) {
    return [
        "sync_server_id" => factory('App\SyncServer')->create(),
        "channel_id" => factory('App\ChannelsList')->create(),
        "channel_server_id" => factory('App\ChannelServer')->create(),
    ];
});
