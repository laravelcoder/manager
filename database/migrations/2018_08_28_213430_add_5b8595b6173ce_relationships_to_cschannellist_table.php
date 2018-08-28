<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b8595b6173ceRelationshipsToCsChannelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_channel_lists', 'channelid_id')) {
                $table->integer('channelid_id')->unsigned()->nullable();
                $table->foreign('channelid_id', '196513_5b8591094939f')->references('id')->on('channels_lists')->onDelete('cascade');
            }
            if (! Schema::hasColumn('cs_channel_lists', 'channelserver_id')) {
                $table->integer('channelserver_id')->unsigned()->nullable();
                $table->foreign('channelserver_id', '196513_5b8591095d089')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('cs_channel_lists', 'input_id')) {
                $table->integer('input_id')->unsigned()->nullable();
                $table->foreign('input_id', '196513_5b85943cb5440')->references('id')->on('csis')->onDelete('cascade');
            }
            if (! Schema::hasColumn('cs_channel_lists', 'output_id')) {
                $table->integer('output_id')->unsigned()->nullable();
                $table->foreign('output_id', '196513_5b85943ccc977')->references('id')->on('csos')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('cs_channel_lists', function (Blueprint $table): void {
        });
    }
}
