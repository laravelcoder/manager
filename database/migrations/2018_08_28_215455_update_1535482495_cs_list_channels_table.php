<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535482495CsListChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_list_channels', function (Blueprint $table): void {
            if (Schema::hasColumn('cs_list_channels', 'list_id')) {
                $table->dropForeign('201570_5b8598899f333');
                $table->dropIndex('201570_5b8598899f333');
                $table->dropColumn('list_id');
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
        Schema::table('cs_list_channels', function (Blueprint $table): void {
        });
    }
}
