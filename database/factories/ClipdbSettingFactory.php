<?php

declare(strict_types=1);
$factory->define(App\ClipdbSetting::class, function (Faker\Generator $faker) {
    return [
        'clip_db_url' => $faker->name,
    ];
});
