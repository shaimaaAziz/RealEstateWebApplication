<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messageType extends Model
{

    protected $table="message_Type";
    public  function contacts(){
        return $this->hasMany('App\Contact');
    }
}
