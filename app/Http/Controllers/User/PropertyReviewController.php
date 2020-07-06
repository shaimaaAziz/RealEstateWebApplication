<?php

namespace App\Http\Controllers\User;

use App\Property;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;
use willvincent\Rateable\Rateable;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PropertyReviewController extends Controller
{
    
    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */


    public function userRating()

    {

        $property1 = Property::all();
         $user= Auth::user();
        $propertyRating = Rating::all();


         $property= $propertyRating->where('user_id','=',$user->id   );
        return view('user/userRating',compact('property'));

    }

    

    // public function show($id)

    // {

    //     $Property = Property::find($id);

    //     return view('PropertyShow',compact('Property'));

    // }



    public function postProperty(Request $request)

    {

        request()->validate(['rate' => 'required']);
        $property = Property::findOrFail($request->id);
       
        $property->rateOnce($request->rate);
        $property->save();
        Toastr::success( 'تم التقييم بنجاح'  );

        return redirect()->route("home");

    }



    public function postPropertyforPersonal(Request $request)

    {

        request()->validate(['rate' => 'required']);
        $property = Property::findOrFail($request->id);
       
        $property->rateOnce($request->rate);
        $property->save();
        Toastr::success( 'تم التقييم بنجاح'  );

        return redirect()->route("properties.post");

    }


}
