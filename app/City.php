<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public  function property(){
        return $this->hasMany('App\Property');
    }
}
