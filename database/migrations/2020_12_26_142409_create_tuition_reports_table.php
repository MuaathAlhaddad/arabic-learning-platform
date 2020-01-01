<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_tutor_id')->unsigned()->index();            
            $table->integer('rate');
            $table->timestamps();
            $table->foreign('student_tutor_id')->references('id')->on('student_tutor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuition_reports');
    }
}
