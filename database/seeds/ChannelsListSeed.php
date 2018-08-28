<?php

use Illuminate\Database\Seeder;

class ChannelsListSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'channel_name' => 'RGTI', 'channel_type' => 'prod',],
            ['id' => 2, 'channel_name' => 'KATHYANI', 'channel_type' => 'prod',],
            ['id' => 3, 'channel_name' => 'ARBMU-DYN', 'channel_type' => 'prod',],
            ['id' => 4, 'channel_name' => 'BOOM-DYN', 'channel_type' => 'prod',],
            ['id' => 5, 'channel_name' => 'NBAPOR', 'channel_type' => 'prod',],
            ['id' => 6, 'channel_name' => 'SIKH', 'channel_type' => 'prod',],
            ['id' => 7, 'channel_name' => 'UDNHD-DYN', 'channel_type' => 'prod',],

        ];

        foreach ($items as $item) {
            \App\ChannelsList::create($item);
        }
    }
}
