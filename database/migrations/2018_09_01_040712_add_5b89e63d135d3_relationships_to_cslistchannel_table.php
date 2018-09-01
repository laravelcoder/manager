<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89e63d135d3RelationshipsToCsListChannelTable extends Migration
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
            if (! Schema::hasColumn('cs_list_channels', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '201570_5b8722dc2dfa6')->references('id')->on('sync_servers')->onDelete('cascade');
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
            if (Schema::hasColumn('cs_list_channels', 'channel_id')) {
                $table->dropForeign('201570_5b859889b897d');
                $table->dropIndex('201570_5b859889b897d');
                $table->dropColumn('channel_id');
            }
            if (Schema::hasColumn('cs_list_channels', 'channelserver_id')) {
                $table->dropForeign('201570_5b859a803f0f4');
                $table->dropIndex('201570_5b859a803f0f4');
                $table->dropColumn('channelserver_id');
            }
            if (Schema::hasColumn('cs_list_channels', 'sync_server_id')) {
                $table->dropForeign('201570_5b8722dc2dfa6');
                $table->dropIndex('201570_5b8722dc2dfa6');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}
