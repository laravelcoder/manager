<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b859deb3017f5b859deb1fa4aCsChannelListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cs_channel_list_sync_server');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('cs_channel_list_sync_server')) {
            Schema::create('cs_channel_list_sync_server', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
            $table->foreign('cs_channel_list_id', 'fk_196513_cschannellist_syncserver_id')->references('id')->on('cs_channel_lists');
                $table->integer('sync_server_id')->unsigned()->nullable();
            $table->foreign('sync_server_id', 'fk_174787_syncserver_cschannellist_id')->references('id')->on('sync_servers');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
