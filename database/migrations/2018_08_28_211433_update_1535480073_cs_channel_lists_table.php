<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535480073CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channel_name')) {
                $table->dropColumn('channel_name');
            }
            if(Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->dropColumn('channel_type');
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
                        $table->string('channel_name')->nullable();
                $table->string('channel_type')->nullable();
                
        });

    }
}
