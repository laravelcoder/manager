<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534545894VideoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_settings', function (Blueprint $table) {
            if(Schema::hasColumn('video_settings', 'url_params')) {
                $table->dropColumn('url_params');
            }
            
        });
Schema::table('video_settings', function (Blueprint $table) {
            
if (!Schema::hasColumn('video_settings', 'hls')) {
                $table->integer('hls')->nullable();
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
        Schema::table('video_settings', function (Blueprint $table) {
            $table->dropColumn('hls');
            
        });
Schema::table('video_settings', function (Blueprint $table) {
                        $table->string('url_params')->nullable();
                
        });

    }
}
