<?php

namespace App\Http\Controllers\Owner;

use toastr;
use App\User;
use App\Property;
use App\mapLocation;
use App\Http\Requests;
use Illuminate\Http\Request;
use yajra\Datatables\Datables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $user =  Auth::user();
        $property= Property::where('user_id',$user->id)->get();

        return view('owner/property/index',compact('property'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $property= Property::all();
        return view('owner/property/add',compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $this->validate($request,[
            'type'=>'required',
//            'price'=>'required',
//            'roomNumbers'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'description'=>'required',
//            'propertyPeriod'=>'required',
            'image'=>'required',
            'area'=>'required',

        ]);

        $property = new Property();
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);

        $mapLocation= new  mapLocation();

        $mapLocation->create([

            'property_id'=>$request->property_id,
            'Longitude'=>$request->Longitude,
            'Latitude'=>$request->Latitude,


        ]);

        $property->type= $request->type;
        $property->price = $request->price;
        $property->roomNumbers = $request->roomNumbers;
        $property->state =$request->state;
        $property->description = $request->description;
        $property->propertyPeriod =$request->propertyPeriod;
        $property->street =$request->street;
        $property->image =$photoName;
        $property->status ='0';  // the property is available
        $property->city =$request->city;
        $property->area=$request->area;
        $property->user_id =Auth::user()->id;

        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('propertyImages/' . $fileName);
            Image::make($image)->resize(100, 200)->save($location);
            $property->image = $fileName;
        }

        if($property->save()){
            toastr()->success('flash_message', 'تمت اضافة العضو بنجاح');

        }else{
            $request->session()->flash('error',' يوجد هنالك مشكلة في  عملية الإضافة');
        }




        return redirect('owner/Ownerpanel/Property')->withFlashMessage('تمت اضافة العضو بنجاح');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property= Property::find($id);
        // dd(   $property->id);
        $mapLocation= DB::table('map_locations')->where('id' ,$id)->first();
        return view('owner/property/show',compact('property','mapLocation'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property= Property::find($id);
        $im=$property->image;
        return view('owner/property/edit',compact('property','im'));
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

        $this->validate($request, [
            'type'=>'required',
//            'price'=>'required',
//            'roomNumbers'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'description'=>'required',
//            'propertyPeriod'=>'required',
//            'image'=>'required',
            'area'=>'required',
        ]);

       $property= Property::find($id);
       $property->type= $request->type;
       $property->price= $request->price;
       $property->roomNumbers= $request->roomNumbers;
       $property->state =$request->state;
       $property->description =$request->description;
       $property->propertyPeriod =$request->propertyPeriod;
       $property->street =$request->street;
       $property->city =$request->city;
       $property->area =$request->area;
       $property->status =$request->status;
       if($request->hasFile('image')) {
           //add the new photo
           $image = $request->file('image');
           $fileName = time() . '.' . $image->getClientOriginalExtension();
           $location = public_path('propertyImages/' . $fileName);
           Image::make($image)->resize(100, 200)->save($location);
           $oldFileName = $property->image;
           //update the database
           $property->image = $fileName;
           //delete the old image
           Storage::delete( $oldFileName);
       }
       if($property->save()){
           $request->session()->flash('success','  تم تعديله بنجاح');
       }else{
           $request->session()->flash('error',' يوجد هنالك مشكلة في تعديل ');
       }

        return redirect()->route('Property.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property= Property::find($id);
        $property->delete();

        return redirect()->route('Property.index');


    }

    public function favorite()
    {
        // $property= DB::table('property_user')->where('user_id' ,Auth::user()->id)->get();
       $user= Auth::user()->id;

        $property=  Property::whereHas('favorite_to_users' ,function($query) use ($user){
            $query->where('user_id', $user);
        })->get();
       
    return view('owner.property.favorite',compact('property'));
    }
}
//            php artisan storage:link
