<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b73304409c885b733044078ffChannelCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('channel_cs_channel_list');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (! Schema::hasTable('channel_cs_channel_list')) {
            Schema::create('channel_cs_channel_list', function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', 'fk_p_174144_196513_cschan_5b732e4e755a0')->references('id')->on('channels');
                $table->integer('cs_channel_list_id')->unsigned()->nullable();
                $table->foreign('cs_channel_list_id', 'fk_p_196513_174144_channe_5b732e4e76387')->references('id')->on('cs_channel_lists');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
