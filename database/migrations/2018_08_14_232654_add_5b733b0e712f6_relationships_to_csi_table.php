<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b733b0e712f6RelationshipsToCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csis', function (Blueprint $table) {
            if (!Schema::hasColumn('csis', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174671_5b2a9431e0a03')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (!Schema::hasColumn('csis', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '174671_5b2aa5b01e903')->references('id')->on('cs_channel_lists')->onDelete('cascade');
            }
            if (!Schema::hasColumn('csis', 'protocol_id')) {
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', '174671_5b2a8b798e934')->references('id')->on('protocols')->onDelete('cascade');
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
        Schema::table('csis', function (Blueprint $table) {
        });
    }
}
