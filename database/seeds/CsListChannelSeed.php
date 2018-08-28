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

            ['id' => 1, 'name' => 'RGTI', 'channel_id' => 1, 'channelserver_id' => 1],
            ['id' => 2, 'name' => null, 'channel_id' => 2, 'channelserver_id' => 1],
            ['id' => 3, 'name' => null, 'channel_id' => 3, 'channelserver_id' => 1],
            ['id' => 4, 'name' => null, 'channel_id' => 4, 'channelserver_id' => 1],
            ['id' => 5, 'name' => null, 'channel_id' => 5, 'channelserver_id' => 1],

        ];

        foreach ($items as $item) {
            \App\CsListChannel::create($item);
        }
    }
}
