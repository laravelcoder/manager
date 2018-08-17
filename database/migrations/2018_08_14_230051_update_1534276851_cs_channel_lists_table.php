<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534276851CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channel_info_id')) {
                $table->dropForeign('196513_5b732f584bf98');
                $table->dropIndex('196513_5b732f584bf98');
                $table->dropColumn('channel_info_id');
            }
            
        });
Schema::table('cs_channel_lists', function (Blueprint $table) {
            
if (!Schema::hasColumn('cs_channel_lists', 'channel_name')) {
                $table->string('channel_name')->nullable();
                }
if (!Schema::hasColumn('cs_channel_lists', 'channel_type')) {
                $table->enum('channel_type', array('prod', 'dev'))->nullable();
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
            $table->dropColumn('channel_name');
            $table->dropColumn('channel_type');
            
        });
Schema::table('cs_channel_lists', function (Blueprint $table) {
                        
        });

    }
}
