<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class CsListChannelSeed extends Seeder
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
            \App\CsListChannel::create($item);
        }
    }
}
