<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('employee_position_id')->index();
            $table->foreign('employee_position_id')
                ->references('id')->on('employee_positions')
                ->onDelete('cascade');
            $table->string('aadhaar', 12)->nullable();
            $table->string('name')->index();
            $table->string('gender');
            $table->date('dob');    
            $table->string('social_category');
            $table->string('religion');   
            $table->string('address')->nullable();
            $table->string('nature_of_appointment')->nullable();  
            $table->date('date_of_joining_in_service')->nullable();
            $table->string('highest_qualification_academic')->nullable();
            $table->string('highest_qualification_professional')->nullable();
            $table->string('classes_taught')->nullable();
            $table->string('appointed_for_subject')->nullable();
            $table->string('main_subjects_taught_subject1')->nullable();
            $table->string('main_subjects_taught_subject2')->nullable();
            $table->string('mathematics_or_science_studied_upto')->nullable();
            $table->string('english_studied_upto')->nullable();
            $table->string('social_studies_studied_upto')->nullable();   
            $table->string('type_of_disability')->nullable();   
            $table->string('working_in_present_school_since_year')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable(); 
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
        Schema::dropIfExists('employees');
    }
}
