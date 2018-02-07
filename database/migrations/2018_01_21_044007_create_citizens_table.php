<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commune_id')->unsigned();
            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->string('number_list');
            $table->string('number_book');
            $table->dateTime('year');
            $table->string('name');
            $table->string('child_order');
            $table->string('gender');
            $table->string('date_birth');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('pleace_birth');
            $table->string('father_birth');
            $table->string('mother_birth');
            $table->integer('lettertype_id')->unsigned();
            $table->foreign('lettertype_id')->references('id')->on('letter_types')->onDelete('cascade');
            $table->string('other');
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
        Schema::dropIfExists('citizens');
    }
}
