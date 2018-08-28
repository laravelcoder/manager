<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535490864CsListChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_list_channels', function (Blueprint $table) {
            if(Schema::hasColumn('cs_list_channels', 'name')) {
                $table->dropColumn('name');
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
        Schema::table('cs_list_channels', function (Blueprint $table) {
                        $table->string('name')->nullable();
                
        });

    }
}
