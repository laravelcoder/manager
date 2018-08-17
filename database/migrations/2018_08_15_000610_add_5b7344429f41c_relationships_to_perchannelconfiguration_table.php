<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7344429f41cRelationshipsToPerChannelConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('per_channel_configurations', function (Blueprint $table): void {
            if (! Schema::hasColumn('per_channel_configurations', 'rtn_id')) {
                $table->integer('rtn_id')->unsigned()->nullable();
                $table->foreign('rtn_id', '175206_5b2c07c3b147d')->references('id')->on('realtime_notifications')->onDelete('cascade');
            }
            if (! Schema::hasColumn('per_channel_configurations', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175206_5b2c0cffb175f')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('per_channel_configurations', function (Blueprint $table): void {
        });
    }
}
