<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->dateTime('date_started');
            $table->time('time_count');
            $table->string('location');
            $table->string('collab_with');
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
        Schema::dropIfExists('work_logs');
    }
}
