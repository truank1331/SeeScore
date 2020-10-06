<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoreinfo', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->string('subjectid',10);
            $table->string('year',4);
            $table->string('term',2);
            $table->string('section',6);

            $table->string('scoreid',100);
            $table->string('info');
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
        Schema::dropIfExists('scoreinfo');
    }
}
