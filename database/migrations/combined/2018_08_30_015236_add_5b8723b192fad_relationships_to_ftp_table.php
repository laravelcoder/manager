<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b8723b192fadRelationshipsToFtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ftps', function(Blueprint $table) {
            if (!Schema::hasColumn('ftps', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175202_5b2c0bede8de4')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('ftps', function(Blueprint $table) {
            if(Schema::hasColumn('ftps', 'sync_server_id')) {
                $table->dropForeign('175202_5b2c0bede8de4');
                $table->dropIndex('175202_5b2c0bede8de4');
                $table->dropColumn('sync_server_id');
            }
            
        });
    }
}
