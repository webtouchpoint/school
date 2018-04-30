<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
                
            $table->date('date');
            $table->unsignedInteger('fees_structure_id')->index();
            $table->foreign('fees_structure_id')
                ->references('id')->on('fees_structures')
                ->onDelete('cascade');

            $table->unsignedInteger('academic_info_id')->index();
            $table->foreign('academic_info_id')
                ->references('id')->on('academic_infos')
                ->onDelete('cascade');
            $table->double('amount');
            $table->string('description')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
