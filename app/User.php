<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Hash;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->is_admin;
    }

    public function addNewUser($username, $password, $position){
        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->position = $position;
        $user->save();
        
        return $user->id;
    }


    public function checkIfExist($username){
        if(User::where('username', '=', $username)->exists()){
            return true;
        } else {
            return false;
        }
    }
}
