<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7c628a87c4eRelationshipsToVideoSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('video_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('video_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197930_5b7c6289b5212')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('video_settings', function (Blueprint $table): void {
        });
    }
}
