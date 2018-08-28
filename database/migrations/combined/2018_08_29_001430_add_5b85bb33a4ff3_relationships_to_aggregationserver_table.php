<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b85bb33a4ff3RelationshipsToAggregationServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aggregation_servers', function(Blueprint $table) {
            if (!Schema::hasColumn('aggregation_servers', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197934_5b7c62228845c')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('aggregation_servers', function(Blueprint $table) {
            if(Schema::hasColumn('aggregation_servers', 'sync_server_id')) {
                $table->dropForeign('197934_5b7c62228845c');
                $table->dropIndex('197934_5b7c62228845c');
                $table->dropColumn('sync_server_id');
            }
            
        });
    }
}
