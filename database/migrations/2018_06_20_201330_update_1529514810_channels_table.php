<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529514810ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channels', function (Blueprint $table): void {
            if (Schema::hasColumn('channels', 'cs_input_id')) {
                $table->dropForeign('174144_5b2a8a31bbd87');
                $table->dropIndex('174144_5b2a8a31bbd87');
                $table->dropColumn('cs_input_id');
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
