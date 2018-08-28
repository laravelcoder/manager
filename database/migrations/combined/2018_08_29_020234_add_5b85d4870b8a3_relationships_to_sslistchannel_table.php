<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b85d4870b8a3RelationshipsToSsListChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ss_list_channels', function(Blueprint $table) {
            if (!Schema::hasColumn('ss_list_channels', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '201630_5b85cf9ea42f2')->references('id')->on('sync_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('ss_list_channels', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '201630_5b85cf9eb9a60')->references('id')->on('channels_lists')->onDelete('cascade');
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
        Schema::table('ss_list_channels', function(Blueprint $table) {
            if(Schema::hasColumn('ss_list_channels', 'sync_server_id')) {
                $table->dropForeign('201630_5b85cf9ea42f2');
                $table->dropIndex('201630_5b85cf9ea42f2');
                $table->dropColumn('sync_server_id');
            }
            if(Schema::hasColumn('ss_list_channels', 'channel_id')) {
                $table->dropForeign('201630_5b85cf9eb9a60');
                $table->dropIndex('201630_5b85cf9eb9a60');
                $table->dropColumn('channel_id');
            }
            
        });
    }
}
