<?php

use Illuminate\Database\Seeder;

class CsoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [


        ];

        foreach ($items as $item) {
            \App\Cso::create($item);
        }
    }
}
