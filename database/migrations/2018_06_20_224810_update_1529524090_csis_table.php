<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529524090CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csis', function (Blueprint $table): void {
            if (Schema::hasColumn('csis', 'channel_id')) {
                $table->dropForeign('174671_5b2aa5b01e903');
                $table->dropIndex('174671_5b2aa5b01e903');
                $table->dropColumn('channel_id');
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
