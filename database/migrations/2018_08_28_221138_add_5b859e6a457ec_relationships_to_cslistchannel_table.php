<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b859e6a457ecRelationshipsToCsListChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_list_channels', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_list_channels', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '201570_5b859889b897d')->references('id')->on('channels_lists')->onDelete('cascade');
            }
            if (! Schema::hasColumn('cs_list_channels', 'channelserver_id')) {
                $table->integer('channelserver_id')->unsigned()->nullable();
                $table->foreign('channelserver_id', '201570_5b859a803f0f4')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('cs_list_channels', function (Blueprint $table): void {
        });
    }
}
