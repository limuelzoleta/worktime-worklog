<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTimeframes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_timeframes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('task_id');
            $table->date('estimated_date');
            $table->time('estimated_time');
            $table->integer('user_id');
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
        Schema::dropIfExists('task_timeframes');
    }
}
