<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535490647CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csis', function (Blueprint $table): void {
            if (Schema::hasColumn('csis', 'listname_id')) {
                $table->dropForeign('174671_5b8594f1d7ad8');
                $table->dropIndex('174671_5b8594f1d7ad8');
                $table->dropColumn('listname_id');
            }
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
