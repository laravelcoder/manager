<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529431721ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channel_servers', function (Blueprint $table): void {
            if (! Schema::hasColumn('channel_servers', 'ssm')) {
                $table->string('ssm')->nullable();
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
            $table->dropColumn('ssm');
        });
    }
}
