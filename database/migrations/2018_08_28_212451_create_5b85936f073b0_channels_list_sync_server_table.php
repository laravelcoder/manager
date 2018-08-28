<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b85936f073b0ChannelsListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('channels_list_sync_server')) {
            Schema::create('channels_list_sync_server', function (Blueprint $table) {
                $table->integer('channels_list_id')->unsigned()->nullable();
                $table->foreign('channels_list_id', 'fk_p_201556_174787_syncse_5b85936f0754a')->references('id')->on('channels_lists')->onDelete('cascade');
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', 'fk_p_174787_201556_channe_5b85936f07640')->references('id')->on('sync_servers')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels_list_sync_server');
    }
}
