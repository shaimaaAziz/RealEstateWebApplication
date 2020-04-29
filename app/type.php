<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public  function property(){
        return $this->hasMany('App\properties');
    }
}
