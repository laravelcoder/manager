<?php

$factory->define(App\Timezone::class, function (Faker\Generator $faker) {
    return [
        "timezone" => $faker->name,
    ];
});
