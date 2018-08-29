<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529521314CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csis', function (Blueprint $table): void {
            if (Schema::hasColumn('csis', 'cid_id')) {
                $table->dropForeign('174671_5b2a8b0fc2377');
                $table->dropIndex('174671_5b2a8b0fc2377');
                $table->dropColumn('cid_id');
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
        Schema::table('csis', function (Blueprint $table): void {
        });
    }
}
