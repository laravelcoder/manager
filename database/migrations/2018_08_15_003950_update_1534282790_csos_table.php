<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Update1534282790CsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csos', function (Blueprint $table) {
            if (Schema::hasColumn('csos', 'cid_id')) {
                $table->dropForeign('174743_5b2a973fc8347');
                $table->dropIndex('174743_5b2a973fc8347');
                $table->dropColumn('cid_id');
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
        Schema::table('csos', function (Blueprint $table) {
        });
    }
}
