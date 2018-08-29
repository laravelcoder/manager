<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1529517882CsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('csos')) {
            Schema::create('csos', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('ocloud_a')->nullable();
                $table->integer('ocp_a')->nullable()->unsigned();
                $table->string('ocloud_b')->nullable();
                $table->string('ocp_b')->nullable();

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
        Schema::dropIfExists('csos');
    }
}
