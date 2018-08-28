<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class CsChannelListSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 5, 'channel_name' => 'HGTVD_caipy', 'channel_type' => 'dev', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 6, 'channel_name' => 'SETHHD', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 7, 'channel_name' => 'CLRS', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 8, 'channel_name' => 'SPLUS', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 9, 'channel_name' => 'WLLOHD', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 10, 'channel_name' => 'ZEETVH', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 11, 'channel_name' => 'AAJTK', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 12, 'channel_name' => 'SAB', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 13, 'channel_name' => 'BEIN2', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 14, 'channel_name' => 'FOODHD_CAIPY', 'channel_type' => 'dev', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 15, 'channel_name' => 'WILXTRA', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 16, 'channel_name' => 'SETMX', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 17, 'channel_name' => 'ESTRELLA', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 18, 'channel_name' => 'PTC', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 19, 'channel_name' => 'TV9', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 20, 'channel_name' => 'ZNEWS', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 21, 'channel_name' => 'CINEL', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 22, 'channel_name' => 'ZEECINH', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 23, 'channel_name' => 'TVASA', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],
            ['id' => 24, 'channel_name' => 'SVJAY', 'channel_type' => 'prod', 'channel_server_id' => 1, 'sync_server_id' => null],

        ];

        foreach ($items as $item) {
            \App\CsChannelList::create($item);
        }
    }
}
