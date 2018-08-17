<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2c0ad45c515RelationshipsToReportSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_settings', function(Blueprint $table) {
            if (!Schema::hasColumn('report_settings', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '175215_5b2c0acd65d0a')->references('id')->on('countries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('report_settings', 'synce_server_id')) {
                $table->integer('synce_server_id')->unsigned()->nullable();
                $table->foreign('synce_server_id', '175215_5b2c0acd80164')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('report_settings', function(Blueprint $table) {
            
        });
    }
}