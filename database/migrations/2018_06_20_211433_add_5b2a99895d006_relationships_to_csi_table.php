<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b2a99895d006RelationshipsToCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csis', function (Blueprint $table) {
            if (!Schema::hasColumn('csis', 'cid_id')) {
                $table->integer('cid_id')->unsigned()->nullable();
                $table->foreign('cid_id', '174671_5b2a8b0fc2377')->references('id')->on('channels')->onDelete('cascade');
            }
            if (!Schema::hasColumn('csis', 'protocol_id')) {
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', '174671_5b2a8b798e934')->references('id')->on('protocols')->onDelete('cascade');
            }
            if (!Schema::hasColumn('csis', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174671_5b2a9431e0a03')->references('id')->on('channel_servers')->onDelete('cascade');
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
