<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89e63f57524RelationshipsToFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filters', function(Blueprint $table) {
            if (!Schema::hasColumn('filters', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175220_5b7c60105c488')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('filters', function(Blueprint $table) {
            if(Schema::hasColumn('filters', 'sync_server_id')) {
                $table->dropForeign('175220_5b7c60105c488');
                $table->dropIndex('175220_5b7c60105c488');
                $table->dropColumn('sync_server_id');
            }
            
        });
    }
}
