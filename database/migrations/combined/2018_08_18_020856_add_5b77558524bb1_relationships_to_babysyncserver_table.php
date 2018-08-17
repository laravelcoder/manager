<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b77558524bb1RelationshipsToBabySyncServerTable extends Migration
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
        });
    }
}
