<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b7c6e3c676efRelationshipsToCsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csos', function (Blueprint $table): void {
            if (! Schema::hasColumn('csos', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174743_5b2a97a71c2dd')->references('id')->on('channel_servers')->onDelete('cascade');
            }
            if (! Schema::hasColumn('csos', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '174743_5b734c26baf5b')->references('id')->on('cs_channel_lists')->onDelete('cascade');
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
<<<<<<< HEAD:database/migrations/2018_08_21_225543_add_5b7c6e3c676ef_relationships_to_cso_table.php
        Schema::table('csos', function(Blueprint $table) {
            if(Schema::hasColumn('csos', 'channel_server_id')) {
                $table->dropForeign('174743_5b2a97a71c2dd');
                $table->dropIndex('174743_5b2a97a71c2dd');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('csos', 'channel_id')) {
                $table->dropForeign('174743_5b734c26baf5b');
                $table->dropIndex('174743_5b734c26baf5b');
                $table->dropColumn('channel_id');
            }
            
=======
        Schema::table('csos', function (Blueprint $table): void {
>>>>>>> a9a4f219fa983f9b7d81334088599cf534f37c23:database/migrations/2018_08_15_003951_add_5b734c2731f9b_relationships_to_cso_table.php
        });
    }
}
