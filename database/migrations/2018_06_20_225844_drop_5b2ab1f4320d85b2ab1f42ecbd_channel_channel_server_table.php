<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b2ab1f4320d85b2ab1f42ecbdChannelChannelServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('channel_channel_server');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('channel_channel_server')) {
            Schema::create('channel_channel_server', function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', 'fk_p_174144_174738_channe_5b2ab104a4900')->references('id')->on('channels');
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_p_174738_174144_channe_5b2ab104a592c')->references('id')->on('channel_servers');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
