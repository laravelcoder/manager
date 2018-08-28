<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

class FilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 2, 'name' => 'RAW', 'sync_server_id' => null],
            ['id' => 3, 'name' => 'Default', 'sync_server_id' => null],
            ['id' => 4, 'name' => 'Detailed', 'sync_server_id' => null],
            ['id' => 5, 'name' => 'Default-Unmerge', 'sync_server_id' => null],
            ['id' => 6, 'name' => 'Pods', 'sync_server_id' => null],
            ['id' => 7, 'name' => 'Pods-Unmerge', 'sync_server_id' => null],
            ['id' => 8, 'name' => 'EPG Starts', 'sync_server_id' => null],
            ['id' => 9, 'name' => 'EPG Correction', 'sync_server_id' => null],

        ];

        foreach ($items as $item) {
            \App\Filter::create($item);
        }
    }
}
