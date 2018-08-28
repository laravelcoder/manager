<?php

$factory->define(App\VideoSetting::class, function (Faker\Generator $faker) {
    return [
        "server_url" => $faker->name,
        "server_redirect" => $faker->name,
        "hls" => $faker->randomNumber(2),
        "sync_server_id" => factory('App\SyncServer')->create(),
        "video_server_type_id" => factory('App\VideoServerType')->create(),
    ];
});
