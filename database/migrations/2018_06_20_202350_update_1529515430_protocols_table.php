<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529515430ProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('protocols', function (Blueprint $table): void {
            if (! Schema::hasColumn('protocols', 'real_name')) {
                $table->string('real_name')->nullable();
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
        Schema::table('protocols', function (Blueprint $table): void {
            $table->dropColumn('real_name');
        });
    }
}
