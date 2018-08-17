<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534276851CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (Schema::hasColumn('cs_channel_lists', 'channel_info_id')) {
                $table->dropForeign('196513_5b732f584bf98');
                $table->dropIndex('196513_5b732f584bf98');
                $table->dropColumn('channel_info_id');
            }
        });
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_channel_lists', 'channel_name')) {
                $table->string('channel_name')->nullable();
            }
            if (! Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->enum('channel_type', ['prod', 'dev'])->nullable();
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
            $table->dropColumn('channel_name');
            $table->dropColumn('channel_type');
        });
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
        });
    }
}
