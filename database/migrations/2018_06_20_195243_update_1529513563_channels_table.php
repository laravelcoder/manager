<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529513563ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channels', function (Blueprint $table): void {
            if (Schema::hasColumn('channels', 'cid_id')) {
                $table->dropForeign('174144_5b2948c60bc3f');
                $table->dropIndex('174144_5b2948c60bc3f');
                $table->dropColumn('cid_id');
            }
        });
        Schema::table('channels', function (Blueprint $table): void {
            if (! Schema::hasColumn('channels', 'type')) {
                $table->enum('type', ['prod', 'dev'])->nullable();
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
            $table->dropColumn('type');
        });
        Schema::table('channels', function (Blueprint $table): void {
        });
    }
}
