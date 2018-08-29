<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1534545292VideoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('video_settings')) {
            Schema::create('video_settings', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('server_url')->nullable();
                $table->string('server_redirect')->nullable();
                $table->integer('hls')->nullable();

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('video_settings');
    }
}
