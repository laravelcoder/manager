<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1534275149CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('cs_channel_lists')) {
            Schema::create('cs_channel_lists', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('channel_name')->nullable();
                $table->string('channel_type')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('cs_channel_lists');
    }
}
