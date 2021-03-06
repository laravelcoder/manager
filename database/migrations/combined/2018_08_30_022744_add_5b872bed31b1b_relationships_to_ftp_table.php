<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b872bed31b1bRelationshipsToFtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('ftps', function (Blueprint $table): void {
            if (! Schema::hasColumn('ftps', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175202_5b2c0bede8de4')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('ftps', function (Blueprint $table): void {
            if (Schema::hasColumn('ftps', 'sync_server_id')) {
                $table->dropForeign('175202_5b2c0bede8de4');
                $table->dropIndex('175202_5b2c0bede8de4');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}
