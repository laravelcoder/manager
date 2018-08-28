<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535478980CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channel_server_id')) {
                $table->dropForeign('196513_5b732e4e87963');
                $table->dropIndex('196513_5b732e4e87963');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('cs_channel_lists', 'sync_server_id')) {
                $table->dropForeign('196513_5b7c6a7c38662');
                $table->dropIndex('196513_5b7c6a7c38662');
                $table->dropColumn('sync_server_id');
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
        Schema::table('cs_channel_lists', function (Blueprint $table) {
                        
        });

    }
}
