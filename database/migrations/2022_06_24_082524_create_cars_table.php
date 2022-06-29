<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use  Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('manufaturers_id');
            $table->string('description');
            $table->string('model');
            $table->string('image');
            $table->date('produced_on');
            $table->timestamps();
            // $table->foreign('manufaturers_id')
            // ->references('id')
            // ->on('manufacturers')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
