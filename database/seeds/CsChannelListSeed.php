<?php

use Illuminate\Database\Seeder;

class CsChannelListSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 5, 'channel_server_id' => 1, 'channel_name' => 'HGTVD_caipy', 'channel_type' => 'dev',],
            ['id' => 6, 'channel_server_id' => 1, 'channel_name' => 'SETHHD', 'channel_type' => 'prod',],
            ['id' => 7, 'channel_server_id' => 1, 'channel_name' => 'CLRS', 'channel_type' => 'prod',],
            ['id' => 8, 'channel_server_id' => 1, 'channel_name' => 'SPLUS', 'channel_type' => 'prod',],
            ['id' => 9, 'channel_server_id' => 1, 'channel_name' => 'WLLOHD', 'channel_type' => 'prod',],
            ['id' => 10, 'channel_server_id' => 1, 'channel_name' => 'ZEETVH', 'channel_type' => 'prod',],
            ['id' => 11, 'channel_server_id' => 1, 'channel_name' => 'AAJTK', 'channel_type' => 'prod',],
            ['id' => 12, 'channel_server_id' => 1, 'channel_name' => 'SAB', 'channel_type' => 'prod',],
            ['id' => 13, 'channel_server_id' => 1, 'channel_name' => 'BEIN2', 'channel_type' => 'prod',],
            ['id' => 14, 'channel_server_id' => 1, 'channel_name' => 'FOODHD_CAIPY', 'channel_type' => 'dev',],
            ['id' => 15, 'channel_server_id' => 1, 'channel_name' => 'WILXTRA', 'channel_type' => 'prod',],
            ['id' => 16, 'channel_server_id' => 1, 'channel_name' => 'SETMX', 'channel_type' => 'prod',],
            ['id' => 17, 'channel_server_id' => 1, 'channel_name' => 'ESTRELLA', 'channel_type' => 'prod',],
            ['id' => 18, 'channel_server_id' => 1, 'channel_name' => 'PTC', 'channel_type' => 'prod',],
            ['id' => 19, 'channel_server_id' => 1, 'channel_name' => 'TV9', 'channel_type' => 'prod',],
            ['id' => 20, 'channel_server_id' => 1, 'channel_name' => 'ZNEWS', 'channel_type' => 'prod',],
            ['id' => 21, 'channel_server_id' => 1, 'channel_name' => 'CINEL', 'channel_type' => 'prod',],
            ['id' => 22, 'channel_server_id' => 1, 'channel_name' => 'ZEECINH', 'channel_type' => 'prod',],
            ['id' => 23, 'channel_server_id' => 1, 'channel_name' => 'TVASA', 'channel_type' => 'prod',],
            ['id' => 24, 'channel_server_id' => 1, 'channel_name' => 'SVJAY', 'channel_type' => 'prod',],

        ];

        foreach ($items as $item) {
            \App\CsChannelList::create($item);
        }
    }
}
