<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapLocation extends Model
{
    protected $fillable =['Latitude','Longitude','property_id'];
   
    public  function property(){
        return $this->belongsTo('App\property');
    }

}
