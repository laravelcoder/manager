<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1529514418CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('csis')) {
            Schema::create('csis', function (Blueprint $table) {
                $table->increments('id');
                $table->string('url')->nullable()->default('/home/caipy/segments_in');
                $table->string('ssm')->nullable();
                $table->string('imc')->default('127.0.0.1')->nullable();
                $table->string('ip')->default('80')->nullable();
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
        Schema::dropIfExists('csis');
    }
}
