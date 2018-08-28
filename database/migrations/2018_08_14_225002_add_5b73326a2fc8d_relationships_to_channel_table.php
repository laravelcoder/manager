<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b73326a2fc8dRelationshipsToChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function(Blueprint $table) {
            if (!Schema::hasColumn('channels', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174144_5b7332698cf84')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels', function(Blueprint $table) {
            
        });
    }
}
