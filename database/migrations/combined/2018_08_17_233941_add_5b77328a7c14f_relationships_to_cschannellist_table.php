<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b77328a7c14fRelationshipsToCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function(Blueprint $table) {
            if (!Schema::hasColumn('cs_channel_lists', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '196513_5b732e4e87963')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('cs_channel_lists', function(Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channel_server_id')) {
                $table->dropForeign('196513_5b732e4e87963');
                $table->dropIndex('196513_5b732e4e87963');
                $table->dropColumn('channel_server_id');
            }
            
        });
    }
}