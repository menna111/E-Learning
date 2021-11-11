<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->on('students')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->on('quizzes')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('result',50)->default('الطالب لا يزال في الامتحان');
            $table->dateTime('end_at');
            $table->boolean('finished')->default(0);
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
        Schema::dropIfExists('quiz_students');
    }
}
