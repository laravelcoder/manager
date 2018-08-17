<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Update1529611306FtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ftps', function (Blueprint $table) {
            if (!Schema::hasColumn('ftps', 'grab_time')) {
                $table->time('grab_time')->nullable();
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
        Schema::table('ftps', function (Blueprint $table) {
            $table->dropColumn('grab_time');
        });
    }
}
