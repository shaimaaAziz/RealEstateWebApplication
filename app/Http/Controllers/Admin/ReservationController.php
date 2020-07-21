<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function displayReservations()
    {
        $reservations = Reservation::all();
        
        return view('admin/property/reservation',compact('reservations'));
   }

   
   public function agreeOnReservations($id)
   {
       $reservations = Reservation::find($id);
       $reservations->reservation = true;

       $property= Property::find($reservations->property_id);
        if($property->state ==0){ //تأجير
            $property->status = 1;  // unavailable
    // }elseif($property->state ==1){ //بيع
    //     $property->delete();
        // $property->status = 1;  // unavailable
        }
  
     $property->save();
     $reservations->save();

       toastr()->success( 'تمت الموافقة بنجاح');

       return redirect()->route('displayAllReservations');
 }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::where('property_id',$id)->first();
        $reservation->reservation = true;
        $reservation->save();

        $property= Property::find($id);
        $property->delete();
    
        return redirect()->route('displayAllReservations');
    
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}

