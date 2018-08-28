<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b858ecf5adc55b858ecf4f23eCsChannelListSyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('cs_channel_list_sync_server');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('cs_channel_list_sync_server')) {
            Schema::create('cs_channel_list_sync_server', function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174787_syncse_5b858cc643453')->references('id')->on('cs_channel_lists');
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', 'fk_p_174787_196513_cschan_5b858cc6422c1')->references('id')->on('sync_servers');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
