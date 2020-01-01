<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayTimeTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_time_tutor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('day_time_id')->unsigned()->index();
            $table->bigInteger('tutor_id')->unsigned()->index();
            $table->boolean('selected')->nullable();
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
            $table->foreign('day_time_id')->references('id')->on('day_times')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_time_tutor');
    }
}
