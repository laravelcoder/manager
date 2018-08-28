<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class GeneralSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'transcoding_server' => 'd-gp2-tocai-1.imovetv.com', 'sync_server_id' => 1],

        ];

        foreach ($items as $item) {
            \App\GeneralSetting::create($item);
        }
    }
}
