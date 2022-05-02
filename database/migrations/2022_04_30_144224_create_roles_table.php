<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('role')->nullable(false);
            $table->date('roleStartDate')->nullable(false);
            $table->date('roleEndDate')->nullable();
            $table->date('roleApprovalDate')->nullable();
            $table->timestamps();

            $table->primary(['user_id', 'role']);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
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
