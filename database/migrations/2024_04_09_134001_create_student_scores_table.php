<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign key column
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('course_title');
            $table->string('course_code');
            $table->string('student_reg_no');
            $table->integer('ca_score');
            $table->integer('exam_score');
            $table->integer('practical_score');
            $table->integer('total_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
};
