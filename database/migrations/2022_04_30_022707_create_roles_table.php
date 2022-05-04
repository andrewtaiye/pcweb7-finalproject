<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->nullable(false);
        });

        Role::insert([
            ['role' => 'Role 1'],
            ['role' => 'Role 2'],
            ['role' => 'Role 3'],
            ['role' => 'Role 4'],
            ['role' => 'Role 5'],
            ['role' => 'Role 6'],
            ['role' => 'Role 7'],
            ['role' => 'Role 8'],
            ['role' => 'Role 9'],
            ['role' => 'Role 10'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
