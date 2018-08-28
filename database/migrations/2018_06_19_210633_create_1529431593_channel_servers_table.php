<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1529431593ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('channel_servers')) {
            Schema::create('channel_servers', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('ip')->nullable();
                $table->string('url')->nullable();
                $table->integer('port')->nullable()->unsigned();
                $table->string('pid')->nullable();

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
        Schema::dropIfExists('channel_servers');
    }
}
