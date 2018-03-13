<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER     = '1';
    const UNVERIFIED_USER   = '0';
    const ADMIN_USER        = 'true';
    const REGULAR_USER      = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verified','verification_token','admin',
    ];
    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verification_token'
    ];
    //name mutator
    public function setNameAttribute($name){
        $this->attributes['name']   = strtolower($name);
    }
    public function getNameAttribute($name){
        return ucwords($name);
    }
    //email mutators
    public function setEmailAttribute($email){
        $this->attributes['email']   = strtolower($email);
    }
    public function getEmailAttribute($email){
        return ucwords($email);
    }
    
    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }
    public function isAdmin(){
        return $this->admin == User::ADMIN_USER;
    }
    public static function genrateVerificationCode(){
        return str_random(50);
    }
}
