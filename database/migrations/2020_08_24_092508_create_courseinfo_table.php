<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseinfo', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->string('subjectid',10);
            $table->string('year',4);
            $table->string('term',2);
            $table->string('section',6);
            $table->string('thainame');
            $table->string('englishname');
            $table->boolean('status');
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
        Schema::dropIfExists('courseinfo');
    }
}
