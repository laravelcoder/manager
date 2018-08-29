<?php

use Illuminate\Database\Seeder;

class CsiSeed extends Seeder
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
            \App\Csi::create($item);
        }
    }
}
