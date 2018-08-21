<?php

declare(strict_types=1);
$factory->define(App\Filter::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'sync_server_id' => factory('App\SyncServer')->create(),
    ];
});
