<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create5b732e4ef0ccfChannelCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('channel_cs_channel_list')) {
            Schema::create('channel_cs_channel_list', function (Blueprint $table) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', 'fk_p_174144_196513_cschan_5b732e4ef0e5c')->references('id')->on('channels')->onDelete('cascade');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174144_channe_5b732e4ef0f4d')->references('id')->on('cs_channel_lists')->onDelete('cascade');
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
        Schema::dropIfExists('channel_cs_channel_list');
    }
}
