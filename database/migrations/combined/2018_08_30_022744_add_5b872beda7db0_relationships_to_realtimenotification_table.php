<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b872beda7db0RelationshipsToRealtimeNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realtime_notifications', function(Blueprint $table) {
            if (!Schema::hasColumn('realtime_notifications', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175205_5b2c0c53b229c')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('realtime_notifications', function(Blueprint $table) {
            if(Schema::hasColumn('realtime_notifications', 'sync_server_id')) {
                $table->dropForeign('175205_5b2c0c53b229c');
                $table->dropIndex('175205_5b2c0c53b229c');
                $table->dropColumn('sync_server_id');
            }
            
        });
    }
}
