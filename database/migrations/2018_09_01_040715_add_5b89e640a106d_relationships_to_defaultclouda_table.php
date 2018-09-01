<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89e640a106dRelationshipsToDefaultCloudATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('default_cloud_as', function(Blueprint $table) {
            if (!Schema::hasColumn('default_cloud_as', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '202827_5b89e4efbf817')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('default_cloud_as', function(Blueprint $table) {
            if(Schema::hasColumn('default_cloud_as', 'channel_server_id')) {
                $table->dropForeign('202827_5b89e4efbf817');
                $table->dropIndex('202827_5b89e4efbf817');
                $table->dropColumn('channel_server_id');
            }
            
        });
    }
}
