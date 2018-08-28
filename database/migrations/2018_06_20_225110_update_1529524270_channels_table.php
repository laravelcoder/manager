<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529524270ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channels', function (Blueprint $table): void {
            if (Schema::hasColumn('channels', 'csi_id')) {
                $table->dropForeign('174144_5b2aaeb07bd2f');
                $table->dropIndex('174144_5b2aaeb07bd2f');
                $table->dropColumn('csi_id');
            }
            if (Schema::hasColumn('channels', 'cso_id')) {
                $table->dropForeign('174144_5b2aaeb08c276');
                $table->dropIndex('174144_5b2aaeb08c276');
                $table->dropColumn('cso_id');
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
        Schema::table('channels', function (Blueprint $table): void {
        });
    }
}
