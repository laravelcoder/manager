<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534545894VideoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('video_settings', function (Blueprint $table): void {
            if (Schema::hasColumn('video_settings', 'url_params')) {
                $table->dropColumn('url_params');
            }
        });
        Schema::table('video_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('video_settings', 'hls')) {
                $table->integer('hls')->nullable();
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
        Schema::table('video_settings', function (Blueprint $table): void {
            $table->dropColumn('hls');
        });
        Schema::table('video_settings', function (Blueprint $table): void {
            $table->string('url_params')->nullable();
        });
    }
}
