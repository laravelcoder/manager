<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b872bedc71b1RelationshipsToReportSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('report_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('report_settings', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '175215_5b2c0acd65d0a')->references('id')->on('countries')->onDelete('cascade');
            }
            if (! Schema::hasColumn('report_settings', 'synce_server_id')) {
                $table->integer('synce_server_id')->unsigned()->nullable();
                $table->foreign('synce_server_id', '175215_5b2c0acd80164')->references('id')->on('sync_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('report_settings', 'filters_id')) {
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
    public function down(): void
    {
        Schema::table('report_settings', function (Blueprint $table): void {
            if (Schema::hasColumn('report_settings', 'country_id')) {
                $table->dropForeign('175215_5b2c0acd65d0a');
                $table->dropIndex('175215_5b2c0acd65d0a');
                $table->dropColumn('country_id');
            }
            if (Schema::hasColumn('report_settings', 'synce_server_id')) {
                $table->dropForeign('175215_5b2c0acd80164');
                $table->dropIndex('175215_5b2c0acd80164');
                $table->dropColumn('synce_server_id');
            }
            if (Schema::hasColumn('report_settings', 'filters_id')) {
                $table->dropForeign('175215_5b2c0b7b0daef');
                $table->dropIndex('175215_5b2c0b7b0daef');
                $table->dropColumn('filters_id');
            }
        });
    }
}
