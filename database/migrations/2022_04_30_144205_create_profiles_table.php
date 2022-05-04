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
            $table->id();
            $table->unsignedBigInteger('userId')->nullable(false);
            $table->date('dateOfBirth')->nullable(false);
            $table->string('idNumber', 9)->nullable(false);
            $table->date('dateAccepted')->nullable(false);
            $table->date('reportingDate')->nullable(false);
            $table->date('lastDay')->nullable(false);
            $table->string('profilePicture')->nullable(false);
            $table->string('permissions', 20)->nullable(false)->default('user');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
