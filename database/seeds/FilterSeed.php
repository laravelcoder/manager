<?php

use Illuminate\Database\Seeder;

class FilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'name' => 'RAW',],
            ['id' => 3, 'name' => 'Default',],
            ['id' => 4, 'name' => 'Detailed',],
            ['id' => 5, 'name' => 'Default-Unmerge',],
            ['id' => 6, 'name' => 'Pods',],
            ['id' => 7, 'name' => 'Pods-Unmerge',],
            ['id' => 8, 'name' => 'EPG Starts',],
            ['id' => 9, 'name' => 'EPG Correction',],

        ];

        foreach ($items as $item) {
            \App\Filter::create($item);
        }
    }
}
