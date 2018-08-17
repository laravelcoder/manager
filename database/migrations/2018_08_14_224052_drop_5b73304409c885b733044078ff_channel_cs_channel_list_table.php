<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Drop5b73304409c885b733044078ffChannelCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('channel_cs_channel_list');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('channel_cs_channel_list')) {
            Schema::create('channel_cs_channel_list', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', 'fk_p_174144_196513_cschan_5b732e4e755a0')->references('id')->on('channels');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174144_channe_5b732e4e76387')->references('id')->on('cs_channel_lists');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
