<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535480073CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (Schema::hasColumn('cs_channel_lists', 'channel_name')) {
                $table->dropColumn('channel_name');
            }
            if (Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->dropColumn('channel_type');
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
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            $table->string('channel_name')->nullable();
            $table->string('channel_type')->nullable();
        });
    }
}
