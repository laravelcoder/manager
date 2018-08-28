<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534969306CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csis', function (Blueprint $table) {
            
if (!Schema::hasColumn('csis', 'url')) {
                $table->string('url')->nullable();
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
            $table->dropColumn('url');
            
        });

    }
}
