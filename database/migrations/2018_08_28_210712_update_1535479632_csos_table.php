<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535479632CsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csos', function (Blueprint $table) {
            if(Schema::hasColumn('csos', 'channel_id')) {
                $table->dropForeign('174743_5b734c26baf5b');
                $table->dropIndex('174743_5b734c26baf5b');
                $table->dropColumn('channel_id');
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
