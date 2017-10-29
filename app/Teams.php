<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $table = 'teams';

    public function addNewTeam($name, $desc){
    	$team = new Teams();
    	$team->name = $name;
    	$team->desc = $desc;
    	$team->save();
    }

}
