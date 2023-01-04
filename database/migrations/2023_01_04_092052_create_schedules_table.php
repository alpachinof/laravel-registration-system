<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('schedules', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->references('id')->on('students');
        //     $table->foreignId('course_id')->references('id')->on('lecturers');
        //     $table->timestamps();
        // });

        // Schema::table('courses', function (Blueprint $table) {
        //     $table->foreignId('semester_id')->references('id')->on('semesters')->after('location_id');
        //     $table->integer('price')->after('unit');
        // });

        Schema::table('lecturers', function (Blueprint $table) {
            $table->integer('salary')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('schedules');

    }
};
