<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b733044735daRelationshipsToCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if (!Schema::hasColumn('cs_channel_lists', 'channel_info_id')) {
                $table->integer('channel_info_id')->unsigned()->nullable();
                $table->foreign('channel_info_id', '196513_5b732f584bf98')->references('id')->on('channels')->onDelete('cascade');
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
        });
    }
}
