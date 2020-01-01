<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tutor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('tutor_id')->unsigned()->index();
            $table->bigInteger('day_time_tutor_id')->unsigned()->index();
            $table->bigInteger('student_package_id')->unsigned()->index();
            $table->boolean('accept_reject')->nullable();
            $table->boolean('complete')->nullable();
            $table->text('student_materials')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
            $table->foreign('day_time_tutor_id')->references('id')->on('day_time_tutor')->onDelete('cascade');
            $table->foreign('student_package_id')->references('id')->on('student_package')->onDelete('cascade');
            $table->unique(['student_id', 'tutor_id','day_time_tutor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tutor');
    }
}
