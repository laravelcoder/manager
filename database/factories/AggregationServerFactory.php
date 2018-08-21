<?php

$factory->define(App\AggregationServer::class, function (Faker\Generator $faker) {
    return [
        "server_name" => $faker->name,
        "server_host" => $faker->name,
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
