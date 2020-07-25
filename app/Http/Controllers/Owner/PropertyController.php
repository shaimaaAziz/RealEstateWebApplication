<?php

namespace App\Http\Controllers\Owner;

use toastr;
use Image;
use Storage;
use App\User;
use App\Property;
use App\Http\Requests;
use Illuminate\Http\Request;
use yajra\Datatables\Datables;
use App\Http\Controllers\Controller;
use App\mapLocation;
use Illuminate\Support\Facades\Auth;

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
            'minPrice'=>'required',
            'maxPrice'=>'required',
            'roomNumbers'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'description'=>'required',
            'propertyPeriod'=>'required',
            'image'=>'required',
            'area'=>'required',

        ]);

        $property = new Property();
        $mapLocation= new  mapLocation();
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);

        $mapLocation->create([

            'property_id'=>$request->property_id,
            'Longitude'=>$request->Longitude,
            'Latitude'=>$request->Latitude

        ]);
        $property->type= $request->type;
        $property->minPrice = $request->minPrice;
        $property->maxPrice = $request->maxPrice;
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

//        $property->create([
//            'type'=> $request->type,
//            'minPrice' => $request->minPrice,
//            'maxPrice' => $request->maxPrice,
//            'roomNumbers' => $request->roomNumbers,
//            'state' =>$request->state,
//            'description' => $request->description,
//            'propertyPeriod' =>$request->propertyPeriod,
//            'street' =>$request->street,
//            'image' =>$photoName,
//            'status' =>'0',  // the property is available
//            'city' =>$request->city,
//            'area'=>$request->area,
//            'user_id' =>Auth::user()->id,
//
//
//        ]);

        //  dd($request->property_id);

        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
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

        return view('owner/property/show',compact('property'));    }

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
        $property= Property::find($id);
//        $property->fill($request->all())->save();
        $this->validate($request, [
            'type'=>'required',
            'minPrice'=>'required',
            'maxPrice'=>'required',
            'roomNumbers'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'description'=>'required',
            'propertyPeriod'=>'required',
            'image'=>'required',
            'area'=>'required',


        ]);
        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(100, 200)->save($location);
            $oldFileName = $property->image;
            //update the database
            $property->image = $fileName;
            //delete the old image
            Storage::delete( $oldFileName);
        }
//
//
//        $property = Property::find($id);
////        $property->type= $type->name;
//        $property->type= $request->type;
//        $property->minPrice= $request->minPrice;
//        $property->maxPrice= $request->maxPrice;
//        $property->roomNumbers= $request->roomNumbers;
//        $property->state =$request->state;
//        $property->description =$request->description;
//        $property->propertyPeriod =$request->propertyPeriod;
//        $property->street =$request->street;
//        $property->city =$request->city;
//        $property->area =$request->area;

        $property->save();
        if($property->save()){
            $request->session()->flash('success','  تم تعديله بنجاح');
        }else{
            $request->session()->flash('error',' يوجد هنالك مشكلة في تعديل العضو');
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

}
//            php artisan storage:link
