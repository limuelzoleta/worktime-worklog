<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $table = 'team_members';

    public function addNewMember($teamId, $userId, $settings){
    	$member = new TeamMembers();
    	$member->team_id = $teamId;
    	$member->user_id = $userId;
    	$member->type = $settings;
    	$member->save();

    }


}
