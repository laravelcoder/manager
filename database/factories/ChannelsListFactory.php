<?php

$factory->define(App\ChannelsList::class, function (Faker\Generator $faker) {
    return [
        "channel_name" => $faker->name,
        "channel_type" => $faker->name,
    ];
});
