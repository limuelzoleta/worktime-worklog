<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(false);
            $table->text('desc');
            $table->integer('team_id');
            $table->enum('status', ['incomplete', 'ongoing', 'hold', 'completed'])->default('incomplete');
            $table->dateTime('target_timeframe')->nullable(true)->default(null);
            $table->dateTime('date_started')->nullable(true)->default(null);
            $table->dateTime('date_completed')->nullable(true)->default(null);
            $table->string('location')->nullable(true)->default(null);
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
        Schema::dropIfExists('projects');
    }
}
