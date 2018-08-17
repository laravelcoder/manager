<?php

$factory->define(App\VideoSetting::class, function (Faker\Generator $faker) {
    return [
        "server_url" => $faker->name,
        "server_redirect" => $faker->name,
        "hls" => $faker->randomNumber(2),
    ];
});
