<?php

use Illuminate\Database\Seeder;

class CsListChannelSeed extends Seeder
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
            \App\CsListChannel::create($item);
        }
    }
}
