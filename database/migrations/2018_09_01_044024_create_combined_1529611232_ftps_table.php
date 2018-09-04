<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1529611232FtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('ftps')) {
            Schema::create('ftps', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('ftp_server')->nullable();
                $table->string('ftp_directory')->nullable();
                $table->string('ftp_username')->nullable();
                $table->string('ftp_password')->nullable();
                $table->time('grab_time')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ftps');
    }
}
