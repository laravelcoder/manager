<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2a8aa94eaf1RelationshipsToChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('channels', function (Blueprint $table): void {
            if (! Schema::hasColumn('channels', 'cs_input_id')) {
                $table->integer('cs_input_id')->unsigned()->nullable();
                $table->foreign('cs_input_id', '174144_5b2a8a31bbd87')->references('id')->on('csis')->onDelete('cascade');
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
        Schema::table('channels', function (Blueprint $table): void {
        });
    }
}
