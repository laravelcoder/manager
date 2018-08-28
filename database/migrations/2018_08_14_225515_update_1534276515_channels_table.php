<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534276515ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            if(Schema::hasColumn('channels', 'channel_server_id')) {
                $table->dropForeign('174144_5b7332698cf84');
                $table->dropIndex('174144_5b7332698cf84');
                $table->dropColumn('channel_server_id');
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
        Schema::table('channels', function (Blueprint $table) {
                        
        });

    }
}
