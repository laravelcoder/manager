<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class SyncServerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'name' => 'SS0-1', 'ss_host' => null],

        ];

        foreach ($items as $item) {
            \App\SyncServer::create($item);
        }
    }
}
