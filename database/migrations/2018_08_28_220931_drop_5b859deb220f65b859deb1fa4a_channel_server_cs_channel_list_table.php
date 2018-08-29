<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b859deb220f65b859deb1fa4aChannelServerCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('channel_server_cs_channel_list');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('channel_server_cs_channel_list')) {
            Schema::create('channel_server_cs_channel_list', function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_174738_channelserver_cschannellist_id')->references('id')->on('channel_servers');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_196513_cschannellist_channelserver_id')->references('id')->on('cs_channel_lists');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
