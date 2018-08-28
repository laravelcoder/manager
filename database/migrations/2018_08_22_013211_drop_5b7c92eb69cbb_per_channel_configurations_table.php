<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b7c92eb69cbbPerChannelConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('per_channel_configurations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('per_channel_configurations')) {
            Schema::create('per_channel_configurations', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('cid')->nullable();
                $table->tinyInteger('active')->nullable()->default('1');
                $table->string('notify_channel_id')->nullable();
                $table->string('offset')->nullable();
                $table->integer('ad_lengths')->nullable()->unsigned();
                $table->string('ad_spacing')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }
}
