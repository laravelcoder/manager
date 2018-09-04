<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89ee09ed63bRelationshipsToGeneralSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('general_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('general_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175203_5b2c0c249dfc7')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('general_settings', function (Blueprint $table): void {
            if (Schema::hasColumn('general_settings', 'sync_server_id')) {
                $table->dropForeign('175203_5b2c0c249dfc7');
                $table->dropIndex('175203_5b2c0c249dfc7');
                $table->dropColumn('sync_server_id');
            }
        });
    }
}
