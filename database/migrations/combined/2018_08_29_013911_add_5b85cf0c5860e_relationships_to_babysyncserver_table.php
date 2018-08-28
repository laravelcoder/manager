<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b85cf0c5860eRelationshipsToBabySyncServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('baby_sync_servers', function (Blueprint $table): void {
            if (! Schema::hasColumn('baby_sync_servers', 'parent_aggregation_server_id')) {
                $table->integer('parent_aggregation_server_id')->unsigned()->nullable();
                $table->foreign('parent_aggregation_server_id', '197935_5b77540c41020')->references('id')->on('aggregation_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('baby_sync_servers', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197935_5b7c62686b385')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('baby_sync_servers', function (Blueprint $table): void {
            if (Schema::hasColumn('baby_sync_servers', 'parent_aggregation_server_id')) {
                $table->dropForeign('197935_5b77540c41020');
                $table->dropIndex('197935_5b77540c41020');
                $table->dropColumn('parent_aggregation_server_id');
            }
            if (Schema::hasColumn('baby_sync_servers', 'sync_server_id')) {
                $table->dropForeign('197935_5b7c62686b385');
                $table->dropIndex('197935_5b7c62686b385');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}
