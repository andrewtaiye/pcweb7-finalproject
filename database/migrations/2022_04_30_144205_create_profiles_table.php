<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('fullName', 50)->nullable(false);
            $table->date('dateOfBirth')->nullable(false);
            $table->string('idNumber', 9)->nullable(false);
            $table->date('dateAccepted')->nullable(false);
            $table->date('reportingDate')->nullable(false);
            $table->date('lastDay')->nullable(false);
            $table->string('profilePicture')->nullable(false);
            $table->string('permissions', 20)->nullable(false)->default('user');
            $table->timestamps();

            $table->primary(['user_id']);
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
        Schema::dropIfExists('profiles');
    }
}
