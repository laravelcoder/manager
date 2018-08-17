<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534277980ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_servers', function (Blueprint $table) {
            
if (!Schema::hasColumn('channel_servers', 'cs_host')) {
                $table->string('cs_host')->nullable();
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
        Schema::table('channel_servers', function (Blueprint $table) {
            $table->dropColumn('cs_host');
            
        });

    }
}
