<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1534546573AggregationServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('aggregation_servers')) {
            Schema::create('aggregation_servers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('server_name')->nullable();
                $table->string('server_host')->nullable();
                
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
        Schema::dropIfExists('aggregation_servers');
    }
}
