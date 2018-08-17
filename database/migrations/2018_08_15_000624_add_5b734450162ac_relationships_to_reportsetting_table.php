<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b734450162acRelationshipsToReportSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('report_settings', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '175215_5b2c0acd65d0a')->references('id')->on('countries')->onDelete('cascade');
            }
            if (!Schema::hasColumn('report_settings', 'synce_server_id')) {
                $table->integer('synce_server_id')->unsigned()->nullable();
                $table->foreign('synce_server_id', '175215_5b2c0acd80164')->references('id')->on('sync_servers')->onDelete('cascade');
            }
            if (!Schema::hasColumn('report_settings', 'filters_id')) {
                $table->integer('filters_id')->unsigned()->nullable();
                $table->foreign('filters_id', '175215_5b2c0b7b0daef')->references('id')->on('filters')->onDelete('cascade');
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
        Schema::table('report_settings', function (Blueprint $table) {
        });
    }
}
