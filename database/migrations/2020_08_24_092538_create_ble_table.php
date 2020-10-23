<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ble', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->string('subjectid',10);
            $table->string('year',4);
            $table->string('term',2);
            $table->string('section',6);

            $table->string('studentid',15);
            $table->string('point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scoreinfo');
    }
}
