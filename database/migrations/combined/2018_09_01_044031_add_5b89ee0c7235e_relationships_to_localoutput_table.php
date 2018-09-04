<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89ee0c7235eRelationshipsToLocalOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('local_outputs', function (Blueprint $table): void {
            if (! Schema::hasColumn('local_outputs', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '202829_5b89e55fdcb9b')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('local_outputs', function (Blueprint $table): void {
            if (Schema::hasColumn('local_outputs', 'channel_server_id')) {
                $table->dropForeign('202829_5b89e55fdcb9b');
                $table->dropIndex('202829_5b89e55fdcb9b');
                $table->dropColumn('channel_server_id');
            }
        });
    }
}
