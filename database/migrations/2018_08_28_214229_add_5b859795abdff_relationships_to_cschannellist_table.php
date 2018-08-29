<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b859795abdffRelationshipsToCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function(Blueprint $table) {
            if (!Schema::hasColumn('cs_channel_lists', 'channelserver_id')) {
                $table->integer('channelserver_id')->unsigned()->nullable();
                $table->foreign('channelserver_id', '196513_5b8591095d089')->references('id')->on('channel_servers')->onDelete('cascade');
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
            
        });
    }
}
