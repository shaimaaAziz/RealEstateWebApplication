<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    public  function property(){
        return $this->hasMany('App\properties');
    }
}
