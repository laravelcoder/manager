<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b8ed6ce4a2f6RelationshipsToDefaultCloudATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('default_cloud_as', function (Blueprint $table): void {
            if (! Schema::hasColumn('default_cloud_as', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '202827_5b89e4efbf817')->references('id')->on('channel_servers')->onDelete('cascade');
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
        Schema::table('default_cloud_as', function (Blueprint $table): void {
            if (Schema::hasColumn('default_cloud_as', 'channel_server_id')) {
                $table->dropForeign('202827_5b89e4efbf817');
                $table->dropIndex('202827_5b89e4efbf817');
                $table->dropColumn('channel_server_id');
            }
        });
    }
}
