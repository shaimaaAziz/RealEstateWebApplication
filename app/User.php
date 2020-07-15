<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','middleName','lastName','mobile','street','city','email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public  function property(){
        return $this->hasMany('App\properties');
    }



    public function favorite_properties(){
        return $this->belongsToMany('App\property')->withTimestamps();
     }


     public function roles(){
        return $this->belongsToMany('App\Role');
     }

     public function hasAnyRoles($roles){  // it will pass an array
         if($this->roles()->whereIn('name' ,$roles)->first()){
            return true;
        }
         return false;
    }

   
    public function hasAnyRole($role){   // it will pass a string
        if($this->roles()->where('name' ,$role)->first()){
            return true;
        }
         return false;   
     }

     public function reservation(){
        return $this->hasMany('App\Reservation');
     }
}
