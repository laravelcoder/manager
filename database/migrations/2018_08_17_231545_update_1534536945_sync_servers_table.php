<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Update1534536945SyncServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sync_servers', function (Blueprint $table) {
            if (!Schema::hasColumn('sync_servers', 'ss_host')) {
                $table->string('ss_host')->nullable();
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
        Schema::table('sync_servers', function (Blueprint $table) {
            $table->dropColumn('ss_host');
        });
    }
}
