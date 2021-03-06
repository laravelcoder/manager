<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b872bec6cb6dRelationshipsToCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csis', function (Blueprint $table): void {
            if (! Schema::hasColumn('csis', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174671_5b2a9431e0a03')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csis', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '174671_5b2aa5b01e903')->references('id')->on('channels_lists')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csis', 'protocol_id')) {
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', '174671_5b2a8b798e934')->references('id')->on('protocols')->onDelete('cascade');
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
        Schema::table('csis', function (Blueprint $table): void {
            if (Schema::hasColumn('csis', 'channel_server_id')) {
                $table->dropForeign('174671_5b2a9431e0a03');
                $table->dropIndex('174671_5b2a9431e0a03');
                $table->dropColumn('channel_server_id');
            }
            if (Schema::hasColumn('csis', 'channel_id')) {
                $table->dropForeign('174671_5b2aa5b01e903');
                $table->dropIndex('174671_5b2aa5b01e903');
                $table->dropColumn('channel_id');
            }
            if (Schema::hasColumn('csis', 'protocol_id')) {
                $table->dropForeign('174671_5b2a8b798e934');
                $table->dropIndex('174671_5b2a8b798e934');
                $table->dropColumn('protocol_id');
            }
        });
    }
}
