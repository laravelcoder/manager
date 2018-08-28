<?php

$factory->define(App\BabySyncServer::class, function (Faker\Generator $faker) {
    return [
        "baby_sync_server" => $faker->name,
        "parent_aggregation_server_id" => factory('App\AggregationServer')->create(),
        "sync_server_id" => factory('App\SyncServer')->create(),
    ];
});
