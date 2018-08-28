<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class SsListChannelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'sync_server_id' => 1, 'channel_id' => 1],

        ];

        foreach ($items as $item) {
            \App\SsListChannel::create($item);
        }
    }
}
