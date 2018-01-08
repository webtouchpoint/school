<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_class_id')->index();
            $table->foreign('school_class_id')
                ->references('id')->on('school_classes')
                ->onDelete('cascade');
            $table->unsignedInteger('fees_category_id')->index();
            $table->foreign('fees_category_id')
                ->references('id')->on('fees_categories')
                ->onDelete('cascade');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->double('amount');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('fees_structures');
    }
}
