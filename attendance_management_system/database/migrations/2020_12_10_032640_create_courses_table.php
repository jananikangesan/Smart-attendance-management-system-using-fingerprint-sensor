<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('courses');
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('course_code',8)->unique();
            $table->string('course_name');
            $table->string('course_level');
            $table->unsignedBigInteger('lect_id');
            $table->unsignedBigInteger('assistant_lect_id');
            $table->enum('semester', [1, 2]);
            $table->timestamps();

            // $table->foreign('lect_id')
            // ->references('lect_id')->on('lecturers')
            // ->onUpdate('cascade')
            // //->onDelete('restrict');
            // ->onDelete('cascade');

            // $table->foreign('assistant_lect_id')
            // ->references('lect_id')->on('lecturers')
            // ->onUpdate('cascade')
            // //->onDelete('restrict');
            // ->onDelete('cascade');e');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
