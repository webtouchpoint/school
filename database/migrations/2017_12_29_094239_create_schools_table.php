<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('dist')->nullable();
            $table->string('state')->nullable();
            $table->string('pin', 6)->nullable();
            $table->string('dise_code')->nullable();
            $table->date('date_of_establishment')->nullable();
            $table->string('type')->nullable();
            $table->tinyinteger('lowest_class')->nullable();
            $table->tinyinteger('highest_class')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
