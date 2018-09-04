<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b89ee0c95d25ChannelServerChannelsListTable extends Migration
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
                $table->foreign('channel_server_id', 'fk_p_174738_201556_channe_5b89ee0c95f48')->references('id')->on('channel_servers')->onDelete('cascade');
                $table->integer('channels_list_id')->unsigned()->nullable();
<<<<<<< HEAD:database/migrations/2018_09_01_044031_create_5b89ee0c95d25_channel_server_channels_list_table.php
                $table->foreign('channels_list_id', 'fk_p_201556_174738_channe_5b89ee0c96025')->references('id')->on('channels_lists')->onDelete('cascade');
                
=======
                $table->foreign('channels_list_id', 'fk_p_201556_174738_channe_5b89e64114922')->references('id')->on('channels_lists')->onDelete('cascade');
>>>>>>> 93843ec172d6c98b61ba81fc1bf1d637fd70b463:database/migrations/combined/2018_09_01_040716_create_5b89e641145a5_channel_server_channels_list_table.php
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
