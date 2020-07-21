<?php

namespace App\Http\Controllers\User;

use App\Property;
use App\Reservation;
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

    public function doReservation(Request $request)
    {
        // dd('hhhh');
        $property = Property::find($request->id);
         $reservation = new Reservation();
         $reservation->property_id = $request->id;
         $reservation->user_id =Auth::user()->id;
         $reservation->reservation = false;  // لم يتم قبول طلب الحجز بعد 
         if($property->state ==0){
         $reservation->state = 'تأجير';
         }elseif($property->state ==1){
         $reservation->state = 'بيع';
        }
         $reservation->save();
         Toastr::success( ' سيتم التواصل معك قريباً من قبل صاحب العقار'  );
         return redirect()->back();
            }


}
