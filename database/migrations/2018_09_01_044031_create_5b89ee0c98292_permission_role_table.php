<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b89ee0c98292PermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('permission_role')) {
            Schema::create('permission_role', function (Blueprint $table): void {
                $table->integer('permission_id')->unsigned()->nullable();
                $table->foreign('permission_id', 'fk_p_174135_174136_role_p_5b89ee0c983ce')->references('id')->on('permissions')->onDelete('cascade');
                $table->integer('role_id')->unsigned()->nullable();
<<<<<<< HEAD:database/migrations/2018_09_01_044031_create_5b89ee0c98292_permission_role_table.php
                $table->foreign('role_id', 'fk_p_174136_174135_permis_5b89ee0c98490')->references('id')->on('roles')->onDelete('cascade');
                
=======
                $table->foreign('role_id', 'fk_p_174136_174135_permis_5b89e641169f3')->references('id')->on('roles')->onDelete('cascade');
>>>>>>> 93843ec172d6c98b61ba81fc1bf1d637fd70b463:database/migrations/combined/2018_09_01_040716_create_5b89e641167aa_permission_role_table.php
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
        Schema::dropIfExists('permission_role');
    }
}
