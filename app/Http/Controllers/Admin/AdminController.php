<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Contact;
use App\Property;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        
        $this->middleware('auth');
        }

        
    // public function index()
    // {
    //     return view('admin.home.index') ;

    //     //
    // }

    public function AdminDashboard(){
        $user =  User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'أدمن');  })->get();
        $properties= Property::all();
        $contacts =Contact::all();
        $propertyFavorite=  Property::whereHas('favorite_to_users' )->get();
        $reservation = Reservation::where('reservation',false)->get();


        return view('admin/home/index',compact('reservation','properties','contacts','propertyFavorite','user'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
