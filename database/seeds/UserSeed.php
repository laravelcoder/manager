<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Phillip Madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$ZVZ1Snukg8hxfAoCQqsJROwKElbV33seTYScoWrADCQh3vUxk.rNi', 'remember_token' => null],
            ['id' => 2, 'name' => 'Mark Hurst', 'email' => 'mark.hurst@sling.com', 'password' => '$2y$10$EGEmZ86S73vOwBBHMwIiTO12M44FitXHS7DjetT/sUEv0Br2aA5y6', 'remember_token' => null],
            ['id' => 3, 'name' => 'Drew Major', 'email' => 'drew.major@sling.com', 'password' => '$2y$10$zQmvhq9vPp3wfV1Q7Em.7uAPdu9NnpvofYWew5XAFF2G120nGwIhW', 'remember_token' => null],
            ['id' => 4, 'name' => 'Jorg Nonnenmacher', 'email' => 'jorg.nonnenmacher@sling.com', 'password' => '$2y$10$ZB7Nes4tnguD0yL6Hjgk.uMZX1hdlxPPbms5Pdc6VsMOR8BD5B.zu', 'remember_token' => null],
            ['id' => 5, 'name' => 'Adam Harral', 'email' => 'adam.harral@sling.com', 'password' => '$2y$10$CjrCvOtzwZxNio.2sphSKuEpNrVLDp95NZPlFMG9wNXjd81kMbphu', 'remember_token' => null],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
