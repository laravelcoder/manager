<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b8723b1af488RelationshipsToGeneralSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function(Blueprint $table) {
            if (!Schema::hasColumn('general_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175203_5b2c0c249dfc7')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('general_settings', function(Blueprint $table) {
            if(Schema::hasColumn('general_settings', 'sync_server_id')) {
                $table->dropForeign('175203_5b2c0c249dfc7');
                $table->dropIndex('175203_5b2c0c249dfc7');
                $table->dropColumn('sync_server_id');
            }
            
        });
    }
}
