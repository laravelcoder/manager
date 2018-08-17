<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Update1529612162PerChannelConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('per_channel_configurations', function (Blueprint $table) {
            if (!Schema::hasColumn('per_channel_configurations', 'ad_lengths')) {
                $table->integer('ad_lengths')->nullable()->unsigned();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('per_channel_configurations', function (Blueprint $table) {
            $table->dropColumn('ad_lengths');
        });
    }
}
