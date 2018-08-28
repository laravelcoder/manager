<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b858e87947ffChannelsListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('channels_list_sync_server')) {
            Schema::create('channels_list_sync_server', function (Blueprint $table): void {
                $table->integer('channels_list_id')->unsigned()->nullable();
                $table->foreign('channels_list_id', 'fk_p_201556_174787_syncse_5b858e8794915')->references('id')->on('channels_lists')->onDelete('cascade');
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', 'fk_p_174787_201556_channe_5b858e87949e9')->references('id')->on('sync_servers')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('channels_list_sync_server');
    }
}