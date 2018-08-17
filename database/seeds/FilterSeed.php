<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class FilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'name' => 'test'],

        ];

        foreach ($items as $item) {
            \App\Filter::create($item);
        }
    }
}
