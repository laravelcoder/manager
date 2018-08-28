<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7c6b1cbf163RelationshipsToVideoSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_settings', function(Blueprint $table) {
            if (!Schema::hasColumn('video_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197930_5b7c6289b5212')->references('id')->on('sync_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('video_settings', 'video_server_type_id')) {
                $table->integer('video_server_type_id')->unsigned()->nullable();
                $table->foreign('video_server_type_id', '197930_5b7c6b1c2ab1c')->references('id')->on('video_server_types')->onDelete('cascade');
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
        Schema::table('video_settings', function(Blueprint $table) {
            
        });
    }
}
