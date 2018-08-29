<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7c62235fa2cRelationshipsToAggregationServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('aggregation_servers', function (Blueprint $table): void {
            if (! Schema::hasColumn('aggregation_servers', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '197934_5b7c62228845c')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('aggregation_servers', function (Blueprint $table): void {
        });
    }
}
