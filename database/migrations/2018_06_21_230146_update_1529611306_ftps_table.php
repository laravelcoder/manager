<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529611306FtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('ftps', function (Blueprint $table): void {
            if (! Schema::hasColumn('ftps', 'grab_time')) {
                $table->time('grab_time')->nullable();
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
        Schema::table('ftps', function (Blueprint $table): void {
            $table->dropColumn('grab_time');
        });
    }
}
