<?php

use Illuminate\Database\Seeder;

class ChannelServerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'cs0-1', 'cs_host' => 'http://d-gp2-caipyascs0-1.imovetv.com',],

        ];

        foreach ($items as $item) {
            \App\ChannelServer::create($item);
        }
    }
}
