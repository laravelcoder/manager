<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b77515b76061AggregationServerSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('aggregation_server_settings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('aggregation_server_settings')) {
            Schema::create('aggregation_server_settings', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('aggregation_server_name')->nullable();
                $table->string('aggregation_host')->nullable();

                $table->timestamps();
            });
        }
    }
}