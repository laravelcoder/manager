<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class CsoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

        ];

        foreach ($items as $item) {
            \App\Cso::create($item);
        }
    }
}
