<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Property;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
   

    $touser= $reservations->user->email;
    $firstName= $reservations->user->firstName;
    $lastName= $reservations->user->lastName;
    $state= $reservations->state;
    $description =$reservations->property->description;
       $ownerId =$reservation->owner_id;
       $owner = User::where('id',$ownerId)->first();
       $data = array("name"=> $firstName,"lastName"=>$lastName,"state"=>$state,"description"=>$description
   ,"ownerFirstName" => $owner->firstName, "ownerLastName" => $owner->lastName );
         
       Mail::send(['html' => 'mailReservation'],$data,function($message) use ( $touser){
           $message->to( $touser);
           $message->subject("  النظر في اقتراحاتكم على موقع عقارات ");
           $message->from("shimaa1751998@gmail.com");
           });

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
    return redirect()->back();
    
 }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = Reservation::where('property_id',$id)->get();
      
        foreach( $reservations as $reservation){
        $reservation->reservation = true;
        $touser= $reservation->user->email;
        $firstName= $reservation->user->firstName;
        $lastName= $reservation->user->lastName;
        $state= $reservation->state;
        $description =$reservation->property->description;
     
        $ownerId =$reservation->owner_id;
        $owner = User::where('id',$ownerId)->first();
        $data = array("name"=> $firstName,"lastName"=>$lastName,"state"=>$state,"description"=>$description
    ,"ownerFirstName" => $owner->firstName, "ownerLastName" => $owner->lastName );
          
           Mail::send(['html' => 'mailReservation'],$data,function($message) use ( $touser){
    
               $message->to( $touser);
               $message->subject("  النظر في اقتراحاتكم على موقع عقارات ");
               $message->from("shimaa1751998@gmail.com");
    
               // $message->to("shimaa1751998@gmail.com");
               // $message->subject("  النظر في اقتراحاتكم على موقع عقارات ");
               // $message->from("shimaa1751998@gmail.com");
               });
               $reservation->save();
            }
        $property= Property::find($id);
        $property->delete();
        toastr()->success( 'تمت الموافقة بنجاح');

        return redirect()->back();
    
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

