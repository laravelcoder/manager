<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b872bece2d95RelationshipsToCsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csos', function (Blueprint $table): void {
            if (! Schema::hasColumn('csos', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174743_5b2a97a71c2dd')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csos', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '174743_5b734c26baf5b')->references('id')->on('channels_lists')->onDelete('cascade');
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
        Schema::table('csos', function (Blueprint $table): void {
            if (Schema::hasColumn('csos', 'channel_server_id')) {
                $table->dropForeign('174743_5b2a97a71c2dd');
                $table->dropIndex('174743_5b2a97a71c2dd');
                $table->dropColumn('channel_server_id');
            }
            if (Schema::hasColumn('csos', 'channel_id')) {
                $table->dropForeign('174743_5b734c26baf5b');
                $table->dropIndex('174743_5b734c26baf5b');
                $table->dropColumn('channel_id');
            }
        });
    }
}
