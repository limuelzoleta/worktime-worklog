<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->nullable(false);
            $table->integer('user_id')->nullable(false);
            $table->enum('type', ['clock', 'timer', 'both']);
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
        Schema::dropIfExists('team_members');
    }
}
