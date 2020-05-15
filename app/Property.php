<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'type','minPrice','maxPrice','roomNumbers','state','description','propertyPeriod', 'street','image','city','adminId','area',
    ];
    public  function user(){
        return $this->belongsTo('App\User');
    }
    public  function cities(){
        return $this->belongsTo('App\City');
    }
    public  function type(){
        return $this->belongsTo('App\type');
    }
}
