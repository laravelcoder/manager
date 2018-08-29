<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b85999b81acc5b85999b7dec1ChannelServerChannelsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('channel_server_channels_list');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('channel_server_channels_list')) {
            Schema::create('channel_server_channels_list', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('channel_server_id')->unsigned()->nullable();
            $table->foreign('channel_server_id', 'fk_p_174738_201556_channe_5b85936e6d462')->references('id')->on('channel_servers');
                $table->integer('channels_list_id')->unsigned()->nullable();
            $table->foreign('channels_list_id', 'fk_p_201556_174738_channe_5b85936e6e4e1')->references('id')->on('channels_lists');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
