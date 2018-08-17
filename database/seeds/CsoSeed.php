<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class CsoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'channel_server_id' => 1, 'cid_id' => 5, 'ocloud_a' => '127.0.0.1', 'ocp_a' => 8077, 'ocloud_b' => null, 'ocp_b' => null],
            ['id' => 2, 'channel_server_id' => 1, 'cid_id' => 6, 'ocloud_a' => null, 'ocp_a' => null, 'ocloud_b' => '127.0.0.1', 'ocp_b' => '5664'],
            ['id' => 3, 'channel_server_id' => 1, 'cid_id' => 24, 'ocloud_a' => '127.0.0.1', 'ocp_a' => null, 'ocloud_b' => '127.0.0.1', 'ocp_b' => '5664'],

        ];

        foreach ($items as $item) {
            \App\Cso::create($item);
        }
    }
}
