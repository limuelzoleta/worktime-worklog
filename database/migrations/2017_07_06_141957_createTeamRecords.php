<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creates teams table
        Schema::create('teams', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('desc');
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
        //drops teams table
        Schema::dropIfExists('teams');
    }
}
