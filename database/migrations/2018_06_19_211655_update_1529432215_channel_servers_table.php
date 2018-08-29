<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529432215ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channel_servers', function (Blueprint $table): void {
            if (! Schema::hasColumn('channel_servers', 'prot')) {
                $table->enum('prot', ['HLS', 'UDP', 'RTP', 'MOVE'])->nullable();
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
        Schema::table('channel_servers', function (Blueprint $table): void {
            $table->dropColumn('prot');
        });
    }
}
