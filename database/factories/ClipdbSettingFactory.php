<?php

$factory->define(App\ClipdbSetting::class, function (Faker\Generator $faker) {
    return [
        "clip_db_url" => $faker->name,
    ];
});
