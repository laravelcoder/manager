<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Seeder;

class VideoServerTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'server_type' => 'Nangu'],
            ['id' => 2, 'server_type' => 'Spbtv'],
            ['id' => 3, 'server_type' => 'Fabrix'],
            ['id' => 4, 'server_type' => 'Edgeware Orbit'],
            ['id' => 5, 'server_type' => 'Harmonic'],
            ['id' => 6, 'server_type' => 'FWM'],
            ['id' => 7, 'server_type' => 'Move'],
            ['id' => 8, 'server_type' => 'Caipy'],
            ['id' => 9, 'server_type' => 'Elemental Delta'],

        ];

        foreach ($items as $item) {
            \App\VideoServerType::create($item);
        }
    }
}
