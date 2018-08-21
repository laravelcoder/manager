<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7c6e3b77fb2RelationshipsToCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_channel_lists', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '196513_5b732e4e87963')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('cs_channel_lists', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '196513_5b7c6a7c38662')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (Schema::hasColumn('cs_channel_lists', 'channel_server_id')) {
                $table->dropForeign('196513_5b732e4e87963');
                $table->dropIndex('196513_5b732e4e87963');
                $table->dropColumn('channel_server_id');
            }
            if (Schema::hasColumn('cs_channel_lists', 'sync_server_id')) {
                $table->dropForeign('196513_5b7c6a7c38662');
                $table->dropIndex('196513_5b7c6a7c38662');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}