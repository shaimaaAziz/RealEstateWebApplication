<?php

namespace App\Http\Controllers;

use App\mapLocation;
use App\Property;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class operationForProperty extends Controller
{
  

    public function showAllEnabel(Property $pro){
        $pro= Property::all();
         $property  = $pro->where('status' , 0);
        return view('welcome' , compact('property'));

    }


    public function ForRent(Property $bu){
        $property = $bu->where('status' , 0)->where('state' ,0)->orderBy('id' , 'desc')->paginate(15);
        return view('welcome' , compact('property'));
    }

    public function ForBuy(Property $bu){
        $property = $bu->where('status' , 0)->where('state' ,1)->orderBy('id' , 'desc')->paginate(15);
        return view('welcome' , compact('property'));
    }

    public function showByType($type , Property $bu){
        if(in_array($type, ['0' , '1' , '2'])){
            $property = $bu->where('status' , 0)->where('type' , $type)->orderBy('id' , 'desc')->paginate(15);
            return view('welcome' , compact('property'));
        }else{
            return Redirect::back();
        }
    }

    public function search(Request $request,Property $bu){
        // $requestAll = Arr::except($request->toArray() , ['submit' , '_token']);
        // $out = '';
        // $i = 0;
        // foreach ($requestAll as $key=> $req){
        //     if($req != ''){
        //         $where = $i == 0 ? " where " : " and ";
        //         $out .= $where. ' ' .$key.' = '.$req;
        //         $i = 2;
        //     }
        // }
        // $query = "select * from properties ".$out;
        // $property = DB::select($query);

        // $search = 'search';
        // return view('welcome' , compact('property' , 'search'));

      

$property= new Property();

if ( $property = $bu->where('status' , 0)) {
        if (isset($request->minPrice)) {
            $property = $property->where('minPrice', 'LIKE', '%' . $request->minPrice . '%');
        } if (isset($request->maxPrice)) {
            $property = $property->where('maxPrice', 'LIKE', '%' . $request->maxPrice . '%');
        } if (isset($request->roomNumbers)) {
            $property = $property->where('roomNumbers', 'LIKE', '%' . $request->roomNumbers . '%');
        } if (isset($request->type)) {
            $property = $property->where('type', 'LIKE', '%' . $request->type . '%');
        } if (isset($request->state)) {
            $property = $property->where('state', 'LIKE', '%' . $request->state . '%');
        } if (isset($request->area)) {
            $property = $property->where('area', 'LIKE', '%' . $request->area . '%');
          
        }

    }
            $property = $property->get();
         return view('welcome' , compact('property'));



    }


    public function showMap(Request $request){
    
       $mapLocation= DB::table('map_locations')->where('property_id' ,$request->property_id)->first();
    //    dd($mapLocation->Latitude);
    // $pro= Property::all();
    $property  = DB::table('properties')->where('id' ,$request->property_id)->first();
       return view('showMap',compact('mapLocation','property'));
    }
}
