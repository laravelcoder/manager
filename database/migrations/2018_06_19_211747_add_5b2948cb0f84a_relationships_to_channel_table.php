<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b2948cb0f84aRelationshipsToChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            if (!Schema::hasColumn('channels', 'cid_id')) {
                $table->integer('cid_id')->unsigned()->nullable();
                $table->foreign('cid_id', '174144_5b2948c60bc3f')->references('id')->on('channels')->onDelete('cascade');
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
        Schema::table('channels', function (Blueprint $table) {
        });
    }
}
