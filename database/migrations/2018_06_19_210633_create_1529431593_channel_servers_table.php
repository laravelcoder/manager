<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1529431593ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('channel_servers')) {
            Schema::create('channel_servers', function (Blueprint $table) {
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
    public function down()
    {
        Schema::dropIfExists('channel_servers');
    }
}
