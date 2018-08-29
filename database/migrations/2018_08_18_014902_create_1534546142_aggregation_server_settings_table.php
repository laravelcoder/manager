<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1534546142AggregationServerSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('aggregation_server_settings')) {
            Schema::create('aggregation_server_settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('aggregation_server_name')->nullable();
                $table->string('aggregation_host')->nullable();
                
                $table->timestamps();
                
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
        Schema::dropIfExists('aggregation_server_settings');
    }
}
