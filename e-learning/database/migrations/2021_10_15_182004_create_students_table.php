<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('phone_number');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->on('levels')->references('id')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->on('departments')->references('id')->cascadeOnUpdate()->cascadeOnDelete();



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
        Schema::dropIfExists('students');
    }
}
