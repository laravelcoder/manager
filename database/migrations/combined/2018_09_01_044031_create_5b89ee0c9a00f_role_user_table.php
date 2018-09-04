<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b89ee0c9a00fRoleUserTable extends Migration
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
                $table->foreign('role_id', 'fk_p_174136_174137_user_r_5b89ee0c9a153')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
<<<<<<< HEAD:database/migrations/combined/2018_09_01_044031_create_5b89ee0c9a00f_role_user_table.php
                $table->foreign('user_id', 'fk_p_174137_174136_role_u_5b89ee0c9a221')->references('id')->on('users')->onDelete('cascade');
                
=======
                $table->foreign('user_id', 'fk_p_174137_174136_role_u_5b89e641180e9')->references('id')->on('users')->onDelete('cascade');
>>>>>>> 93843ec172d6c98b61ba81fc1bf1d637fd70b463:database/migrations/combined/2018_09_01_040716_create_5b89e64117f4a_role_user_table.php
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
