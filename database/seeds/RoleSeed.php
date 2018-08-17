<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'title' => 'Administrator (can create other users)'],
            ['id' => 3, 'title' => 'Manager'],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
