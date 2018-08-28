<?php

$factory->define(App\CsListChannel::class, function (Faker\Generator $faker) {
    return [
        "channel_id" => factory('App\ChannelsList')->create(),
        "channelserver_id" => factory('App\ChannelServer')->create(),
    ];
});
