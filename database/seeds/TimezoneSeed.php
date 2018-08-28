<?php

use Illuminate\Database\Seeder;

class TimezoneSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'timezone' => 'Africa/Abidjan',],
            ['id' => 2, 'timezone' => 'Africa/Accra',],

        ];

        foreach ($items as $item) {
            \App\Timezone::create($item);
        }
    }
}
