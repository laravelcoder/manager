<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1535483497CsListChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cs_list_channels', function (Blueprint $table): void {
            if (! Schema::hasColumn('cs_list_channels', 'name')) {
                $table->string('name')->nullable();
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
            $table->dropColumn('name');
        });
    }
}
