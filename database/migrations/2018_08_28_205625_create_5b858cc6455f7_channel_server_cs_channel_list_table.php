<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b858cc6455f7ChannelServerCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('channel_server_cs_channel_list')) {
            Schema::create('channel_server_cs_channel_list', function (Blueprint $table): void {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_p_174738_196513_cschan_5b858cc645806')->references('id')->on('channel_servers')->onDelete('cascade');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174738_channe_5b858cc645913')->references('id')->on('cs_channel_lists')->onDelete('cascade');
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
        Schema::dropIfExists('channel_server_cs_channel_list');
    }
}
