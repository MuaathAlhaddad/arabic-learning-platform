<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUsageHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__usage__hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_package_id')->unsigned()->index();
            $table->integer('consumed_hours');
            $table->integer('remaining_hours');
            $table->timestamps();
            $table->foreign('student_package_id')->references('id')->on('student_package')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__usage__hours');
    }
}
