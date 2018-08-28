<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534536945SyncServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('sync_servers', function (Blueprint $table): void {
            if (! Schema::hasColumn('sync_servers', 'ss_host')) {
                $table->string('ss_host')->nullable();
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
        Schema::table('sync_servers', function (Blueprint $table): void {
            $table->dropColumn('ss_host');
        });
    }
}
