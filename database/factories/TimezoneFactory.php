<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

$factory->define(App\Timezone::class, function (Faker\Generator $faker) {
    return [
        'timezone' => $faker->name,
    ];
});
