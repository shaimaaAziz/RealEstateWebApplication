<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Property;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
        $this->middleware('auth');
        }

    public function index()
    {
        $user =  Auth::user();
        return view('user/personalPage',compact('user'));

    }
    
    // public function personalInfo()
    // {       
    //     $user =  Auth::user();
    //     // $user = User::find($id);
    //     // dd($user);
    //     // Crypt::encrypt()
    //     // Crypt::decryptString($user->password);
    //     return view('user/indexPersonalInfo',compact('user')); 
    // }

    public function favorite()
    {
        $property  =  Property::whereHas('favorite_to_users' )->get();
    return view('user/favorite',compact('property'));
    }

    public function showReservations()
    {
        $reservations = Reservation::where('reservation',false)->get();
        
        return view('user/reservation',compact('reservations'));
   }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $reservation = Reservation::find($id);
        $reservation->delete();
    
        return redirect()->route('showReservations');
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
        $user= User::find($id);
        // dd($user);
        return view('user/edit',compact('user'));
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
        $user= User::find($id);
        $user->firstName=  $request->firstName;
        $user->middleName=  $request->middleName;
        $user->lastName=  $request->lastName;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->mobile =$request->mobile;
        $user->street =$request->street;
        $user->city =$request->city;

        if($user->save()){
            $request->session()->flash('success',$user->firstName.'  تم تعديله بنجاح');
        }else{
         $request->session()->flash('error',' يوجد هنالك مشكلة في تعديل العضو');
        }
        return redirect('/user/personalPage/show');
        // return redirect(view('user/indexPersonalInfo'));
        // return redirect()->action('userController@personalInfo');
    }

  
}
