<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendance3GStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_3_g__students', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('course_code')->nullable();
            $table->date('date')->nullable();
            $table->integer('hours')->nullable();
            $table->string('hall')->nullable();
            $table->json('attendance_mark')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendance_3_g__students');
    }
}
