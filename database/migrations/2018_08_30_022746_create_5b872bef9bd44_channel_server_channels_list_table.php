<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b872bef9bd44ChannelServerChannelsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('channel_server_channels_list')) {
            Schema::create('channel_server_channels_list', function (Blueprint $table): void {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_p_174738_201556_channe_5b872bef9bed9')->references('id')->on('channel_servers')->onDelete('cascade');
                $table->integer('channels_list_id')->unsigned()->nullable();
                $table->foreign('channels_list_id', 'fk_p_201556_174738_channe_5b872bef9bf82')->references('id')->on('channels_lists')->onDelete('cascade');
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
        Schema::dropIfExists('channel_server_channels_list');
    }
}
