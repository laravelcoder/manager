<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b734bebbdf1f5b734bebbbbfbChannelChannelServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('channel_channel_server');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('channel_channel_server')) {
            Schema::create('channel_channel_server', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('channel_id')->unsigned()->nullable();
            $table->foreign('channel_id', 'fk_174144_channel_channelserver_id')->references('id')->on('channels');
                $table->integer('channel_server_id')->unsigned()->nullable();
            $table->foreign('channel_server_id', 'fk_174738_channelserver_channel_id')->references('id')->on('channel_servers');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
