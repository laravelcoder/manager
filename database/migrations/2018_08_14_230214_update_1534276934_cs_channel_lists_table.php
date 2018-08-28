<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534276934CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->dropColumn('channel_type');
            }
        });
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->string('channel_type')->nullable();
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
            $table->dropColumn('channel_type');
        });
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            $table->enum('channel_type', ['prod', 'dev'])->nullable();
        });
    }
}
