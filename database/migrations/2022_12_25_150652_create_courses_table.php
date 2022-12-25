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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->tinytext('name');
            $table->tinyInteger('unit');
            $table->tinytext('weekday');
            $table->time('start_time', $precision = 2);
            $table->time('end_time', $precision = 2);
            $table->foreignId('lecturer_id')->references('id')->on('lecturers');
            $table->foreignId('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('courses');
    }
};
