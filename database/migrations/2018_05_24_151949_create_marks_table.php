<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');    
            $table->unsignedInteger('school_class_id')->index();
            $table->foreign('school_class_id')
                ->references('id')->on('school_classes')
                ->onDelete('cascade');     
            $table->unsignedInteger('subject_id')->index();
            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade'); 
            $table->unsignedInteger('examination_id')->index();
            $table->foreign('examination_id')
                ->references('id')->on('examinations')
                ->onDelete('cascade');  
            $table->double('marks', 5, 2);            
            $table->softDeletes();                 
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
        Schema::dropIfExists('marks');
    }
}
