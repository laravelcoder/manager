<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535481714CsChannelListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cs_channel_lists', function (Blueprint $table) {
            if(Schema::hasColumn('cs_channel_lists', 'channelid_id')) {
                $table->dropForeign('196513_5b8591094939f');
                $table->dropIndex('196513_5b8591094939f');
                $table->dropColumn('channelid_id');
            }
            if(Schema::hasColumn('cs_channel_lists', 'input_id')) {
                $table->dropForeign('196513_5b85943cb5440');
                $table->dropIndex('196513_5b85943cb5440');
                $table->dropColumn('input_id');
            }
            if(Schema::hasColumn('cs_channel_lists', 'output_id')) {
                $table->dropForeign('196513_5b85943ccc977');
                $table->dropIndex('196513_5b85943ccc977');
                $table->dropColumn('output_id');
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
                        
        });

    }
}
