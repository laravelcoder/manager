<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b73442b34b6fRelationshipsToOutputSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('output_settings', function (Blueprint $table): void {
            if (! Schema::hasColumn('output_settings', 'email_id')) {
                $table->integer('email_id')->unsigned()->nullable();
                $table->foreign('email_id', '175204_5b2c04fe5d7d2')->references('id')->on('users')->onDelete('cascade');
            }
            if (! Schema::hasColumn('output_settings', 'sync_server_id')) {
                $table->integer('sync_server_id')->unsigned()->nullable();
                $table->foreign('sync_server_id', '175204_5b2c0c3b92411')->references('id')->on('sync_servers')->onDelete('cascade');
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
        Schema::table('output_settings', function (Blueprint $table): void {
        });
    }
}
