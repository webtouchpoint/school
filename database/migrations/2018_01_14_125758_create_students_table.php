<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('aadhaar', 12)->nullable();
            $table->string('name')->index();
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('social_category');
            $table->string('religion');
            $table->string('mother_tongue');
            $table->string('locality')->nullable();
            $table->string('address')->nullable();
            $table->string('name_of_guardian')->nullable();
            $table->string('address_of_guardian')->nullable();
            $table->date('date_of_admission');
            $table->boolean('is_bpl');
            $table->boolean('is_disadvantage_group');
            $table->boolean('is_getting_free_education');
            $table->string('type_of_disability')->nullable();
            $table->boolean('is_homeless');
            $table->string('last_examination')->nullable();
            $table->string('percentage_of_marks_obtained')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('kanyashree_id')->nullable();
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
        Schema::dropIfExists('students');
    }
}
