<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b859507a63ed5b859507a330eChannelsListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('channels_list_sync_server');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('channels_list_sync_server')) {
            Schema::create('channels_list_sync_server', function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('channels_list_id')->unsigned()->nullable();
                $table->foreign('channels_list_id', 'fk_p_201556_174787_syncse_5b85936f00de0')->references('id')->on('channels_lists');
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', 'fk_p_174787_201556_channe_5b85936ef41ef')->references('id')->on('sync_servers');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
