<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535481479CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            
if (!Schema::hasColumn('cs_channel_lists', 'name')) {
                $table->string('name')->nullable();
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
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            $table->dropColumn('name');
            
        });

    }
}
