<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b85988a74148RelationshipsToCsListChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_list_channels', function(Blueprint $table) {
            if (!Schema::hasColumn('cs_list_channels', 'list_id')) {
                $table->integer('list_id')->unsigned()->nullable();
                $table->foreign('list_id', '201570_5b8598899f333')->references('id')->on('cs_channel_lists')->onDelete('cascade');
                }
                if (!Schema::hasColumn('cs_list_channels', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '201570_5b859889b897d')->references('id')->on('channels_lists')->onDelete('cascade');
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
        Schema::table('cs_list_channels', function(Blueprint $table) {
            
        });
    }
}
