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
            $table->integer('lettertype_id')->unsigned();
            $table->foreign('lettertype_id')->references('id')->on('letter_types')->onDelete('cascade');
            $table->string('year');
            $table->string('name');
            $table->string('child_order');
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->dateTime('date_birth');
            $table->string('place_birth');
            $table->string('father_name');
            $table->string('f_place_birth');
            $table->dateTime('f_dob');
            $table->string('mother_name');
            $table->string('m_place_birth');
            $table->dateTime('m_dob');
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
