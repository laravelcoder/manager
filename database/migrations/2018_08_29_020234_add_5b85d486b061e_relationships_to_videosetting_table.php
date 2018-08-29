<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b85d486b061eRelationshipsToVideoSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('video_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('video_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197930_5b7c6289b5212')->references('id')->on('sync_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('video_settings', 'video_server_type_id')) {
                $table->integer('video_server_type_id')->unsigned()->nullable();
                $table->foreign('video_server_type_id', '197930_5b7c6b1c2ab1c')->references('id')->on('video_server_types')->onDelete('cascade');
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
        Schema::table('video_settings', function (Blueprint $table): void {
            if (Schema::hasColumn('video_settings', 'sync_server_id')) {
                $table->dropForeign('197930_5b7c6289b5212');
                $table->dropIndex('197930_5b7c6289b5212');
                $table->dropColumn('sync_server_id');
            }
            if (Schema::hasColumn('video_settings', 'video_server_type_id')) {
                $table->dropForeign('197930_5b7c6b1c2ab1c');
                $table->dropIndex('197930_5b7c6b1c2ab1c');
                $table->dropColumn('video_server_type_id');
            }
        });
    }
}
