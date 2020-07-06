<?php

namespace App\Http\Controllers\Admin;

use toastr;

use App\City;
use App\type;
use App\User;
use App\Property;

use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use yajra\Datatables\Datables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;
use League\CommonMark\Inline\Element\Image;

class PropertyController extends Controller
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
        $pro= Property::all();
         $property  = $pro->where('status' , 0);
//        $city=cities::all();
//        $type=type::all();

        return view('admin/property/index',compact('property'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
//       $city=cities::all();
        $property= Property::all();
        $users =  User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'أدمن');
        })->get();
//        $type=type::all();

//        $city=cities::lists('name', 'id');

        return view('admin/property/add',compact('property','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'firstName' =>'required',   
             'lastName' =>'required',
            // 'user_id' =>'required',
        ]);

        $property = new Property();
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);

if($request->firstName ==$request->lastName){

        $property->create([
//            'type' => $type->name,
            'type'=> $request->type,
            'minPrice' => $request->minPrice,
            'maxPrice' => $request->maxPrice,
            'roomNumbers' => $request->roomNumbers,
            'state' =>$request->state,
            'description' => $request->description,
            'propertyPeriod' =>$request->propertyPeriod,
            'street' =>$request->street,
            'image' =>$photoName,
            'city' =>$request->city,
            'status' =>'0',         //property ia available
            'area'=>$request->area,
            'user_id' =>$request->firstName,
        ]);
    }else{
        echo" الاسم الأول واسم العائلة غير متطابقين";
    }
//        Session::flash('flash_message', 'تمت اضافة العضو بنجاح');
        toastr()->success('flash_message', 'تمت اضافة العضو بنجاح');

        return redirect('admin/Adminpanel/Property')->withFlashMessage('تمت اضافة العضو بنجاح');




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

        return view('admin/property/show',compact('property'));    }

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
//        $city=cities::all();
//        $type=type::all();
        return view('admin/property/edit',compact('property','im'));
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
        $property->fill($request->all())->save();
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

//        $input = $request->all();
//        $property->fill($input)->save();

        // $photoName = $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/images',$photoName);
      

        $property = Property::find($id);
//        $property->type= $type->name;
        $property->type= $request->type;
        $property->minPrice= $request->minPrice;
        $property->maxPrice= $request->maxPrice;
        $property->roomNumbers= $request->roomNumbers;
        $property->state =$request->state;
        $property->description =$request->description;
        $property->propertyPeriod =$request->propertyPeriod;
        $property->street =$request->street;
        $property->city =$request->city;
        $property->area =$request->area;


////
            // $oldFileName = $property->image;
            // $property->image = $photoName;            
            // Storage::delete($oldFileName);
//            File::delete(public_path('public/images/' ,$oldFileName));


        $property->save();
        toastr()->success('flash_message', 'تمت اضافة العضو بنجاح');

        return redirect('admin/Adminpanel/Property');


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
    public function rating(){
        $Property = Property::all();

        return view('admin/Property',compact('Property'));

    }
}