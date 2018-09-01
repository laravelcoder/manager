<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b89e640c3372RelationshipsToDefaultCloudBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('default_cloud_bs', function (Blueprint $table): void {
            if (! Schema::hasColumn('default_cloud_bs', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '202828_5b89e52756eb1')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('default_cloud_bs', function (Blueprint $table): void {
            if (Schema::hasColumn('default_cloud_bs', 'channel_server_id')) {
                $table->dropForeign('202828_5b89e52756eb1');
                $table->dropIndex('202828_5b89e52756eb1');
                $table->dropColumn('channel_server_id');
            }
        });
    }
}
