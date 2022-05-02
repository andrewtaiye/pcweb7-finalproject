<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('role')->nullable(false);
            $table->unsignedTinyInteger('assessmentNumber')->nullable(false);
            $table->string('instructor')->nullable(false);
            $table->date('assessmentDate')->nullable(false);
            $table->unsignedTinyInteger('assessmentIntensity')->nullable(false);
            $table->string('assessmentObjective1', 500)->nullable(false);
            $table->string('assessmentObjective2', 500)->nullable();
            $table->string('assessmentObjective3', 500)->nullable();
            $table->unsignedTinyInteger('a')->nullable(false);
            $table->unsignedTinyInteger('b')->nullable(false);
            $table->unsignedTinyInteger('c')->nullable(false);
            $table->unsignedTinyInteger('d')->nullable(false);
            $table->unsignedTinyInteger('e')->nullable(false);
            $table->unsignedTinyInteger('f')->nullable(false);
            $table->unsignedTinyInteger('g')->nullable(false);
            $table->unsignedTinyInteger('h')->nullable(false);
            $table->unsignedTinyInteger('i')->nullable(false);
            $table->unsignedTinyInteger('j')->nullable(false);
            $table->boolean('assessmentSafety')->nullable(false);
            $table->string('assessmentRemarks', 1000)->nullable(false);
            $table->timestamps();

            $table->primary(['user_id', 'role', 'assessmentNumber']);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role')->references('role')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
