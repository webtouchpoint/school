<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_session_id')->index();
            $table->foreign('school_session_id')
                ->references('id')->on('school_sessions')
                ->onDelete('cascade');

            $table->unsignedInteger('student_id')->index();
            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade');

            $table->unsignedInteger('school_class_id')->index();
            $table->foreign('school_class_id')
                ->references('id')->on('school_classes')
                ->onDelete('cascade');

            $table->unsignedInteger('section_id')->index();
            $table->foreign('section_id')
                ->references('id')->on('sections')
                ->onDelete('cascade');
             $table->unsignedInteger('roll_number')->nullable()->index();
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
        Schema::dropIfExists('academic_infos');
    }
}
