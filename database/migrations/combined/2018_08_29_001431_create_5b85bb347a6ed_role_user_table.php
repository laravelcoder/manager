<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b85bb347a6edRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table): void {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_174136_174137_user_r_5b85bb347a85c')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_174137_174136_role_u_5b85bb347a8f0')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('role_user');
    }
}
