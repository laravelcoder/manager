<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1534282790CsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('csos', function (Blueprint $table): void {
            if (Schema::hasColumn('csos', 'cid_id')) {
                $table->dropForeign('174743_5b2a973fc8347');
                $table->dropIndex('174743_5b2a973fc8347');
                $table->dropColumn('cid_id');
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
        Schema::table('csos', function (Blueprint $table): void {
        });
    }
}
