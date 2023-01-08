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
        // Schema::create('transactions', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->references('id')->on('students');
        //     $table->tinytext('type');
        //     $table->decimal('amount', $precision = 8, $scale = 2);
        //     $table->decimal('debt', $precision = 8, $scale = 2);
        //     $table->foreignId('origin_bank_id')->references('id')->on('banks');
        //     $table->foreignId('destination_bank_id')->references('id')->on('banks');
        //     $table->date('due_date')->nullable();
        //     $table->timestamps();
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('transactions');
        // Schema::table('schedules', function (Blueprint $table) {
        //     $table->dropForeign(['course_id']);
        //     });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('course_id');
    
        });

    }
};
