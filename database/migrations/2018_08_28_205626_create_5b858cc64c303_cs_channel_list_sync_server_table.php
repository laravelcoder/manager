<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b858cc64c303CsChannelListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cs_channel_list_sync_server')) {
            Schema::create('cs_channel_list_sync_server', function (Blueprint $table) {
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174787_syncse_5b858cc64c4ef')->references('id')->on('cs_channel_lists')->onDelete('cascade');
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', 'fk_p_174787_196513_cschan_5b858cc64c5e0')->references('id')->on('sync_servers')->onDelete('cascade');
                
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
        Schema::dropIfExists('cs_channel_list_sync_server');
    }
}
