<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534276934CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->dropColumn('channel_type');
            }
            
        });
Schema::table('cs_channel_lists', function (Blueprint $table) {
            
if (!Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->string('channel_type')->nullable();
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
            $table->dropColumn('channel_type');
            
        });
Schema::table('cs_channel_lists', function (Blueprint $table) {
                        $table->enum('channel_type', array('prod', 'dev'))->nullable();
                
        });

    }
}
