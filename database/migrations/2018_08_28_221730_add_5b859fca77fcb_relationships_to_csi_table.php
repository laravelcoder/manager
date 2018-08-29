<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b859fca77fcbRelationshipsToCsiTable extends Migration
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
            if (! Schema::hasColumn('csis', 'protocol_id')) {
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', '174671_5b2a8b798e934')->references('id')->on('protocols')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csis', 'listname_id')) {
                $table->integer('listname_id')->unsigned()->nullable();
                $table->foreign('listname_id', '174671_5b8594f1d7ad8')->references('id')->on('channels_lists')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csis', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '174671_5b2aa5b01e903')->references('id')->on('cs_list_channels')->onDelete('cascade');
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
        });
    }
}
