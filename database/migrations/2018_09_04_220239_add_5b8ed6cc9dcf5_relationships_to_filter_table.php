<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b8ed6cc9dcf5RelationshipsToFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('filters', function (Blueprint $table): void {
            if (! Schema::hasColumn('filters', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175220_5b7c60105c488')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('filters', function (Blueprint $table): void {
            if (Schema::hasColumn('filters', 'sync_server_id')) {
                $table->dropForeign('175220_5b7c60105c488');
                $table->dropIndex('175220_5b7c60105c488');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}
