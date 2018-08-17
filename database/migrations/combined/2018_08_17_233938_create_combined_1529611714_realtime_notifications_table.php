<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCombined1529611714RealtimeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('realtime_notifications')) {
            Schema::create('realtime_notifications', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('server_type', ['NONE', 'CAIPY', 'IMAGINE', 'HARMONIC', 'ENVIVIO', 'OCTOSHAPE', 'MOVE'])->nullable();
                $table->string('r_urltn')->nullable();

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
        Schema::dropIfExists('realtime_notifications');
    }
}
