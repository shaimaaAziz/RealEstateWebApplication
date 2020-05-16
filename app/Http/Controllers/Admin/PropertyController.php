<?php

namespace App\Http\Controllers\Admin;

use toastr;

use App\City;
use App\type;
use App\Property;
use App\Http\Requests;
use http\Client\Curl\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use yajra\Datatables\Datables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        $property= Property::all();
        $city=City::all();
        $type=type::all();

        return view('admin/property/index',compact('property','city','type'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
       $city=City::all();
        $property= Property::all();
        $type=type::all();

//        $city=cities::lists('name', 'id');

        return view('admin/property/add',compact('property','city','type'));
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

        ]);

        $property = new Property();
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);

        $selectCity = City::all();
        $city = $selectCity->find($request->city);
        $selectType = type::all();
        $type = $selectType->find($request->type);

        $property->create([
            'type' => $type->name,
            'minPrice' => $request->minPrice,
            'maxPrice' => $request->maxPrice,
            'roomNumbers' => $request->roomNumbers,
            'state' =>$request->state,
            'description' => $request->description,
            'propertyPeriod' =>$request->propertyPeriod,
            'street' =>$request->street,
            'image' =>$photoName,
            'city' => $city->name,
            'adminId' => $request->adminId

        ]);
        // toastr()->success('تمت اضافة العضو بنجاح');

        return redirect('/Adminpanel/Property');




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
        $city=City::all();
        $type=type::all();
        return view('admin/property/edit',compact('property','city','type'));
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
        ]);

        $input = $request->all();
        $property->fill($input);

//        $photoName = $request->file('image')->getClientOriginalName();
//        $request->file('image')->storeAs('public/images',$photoName);

        $selectCity = City::all();
        $city = $selectCity->find($request->city);
        $selectType = type::all();
        $type = $selectType->find($request->type);
        $property->update([
            'type' => $type->name,
            'minPrice' => $request->minPrice,
            'maxPrice' => $request->maxPrice,
            'roomNumbers' => $request->roomNumbers,
            'state' =>$request->state,
            'description' => $request->description,
            'propertyPeriod' =>$request->propertyPeriod,
            'street' =>$request->street,
            'image' =>$request->image,
            'city' => $city->name,
            'adminId' => $request->adminId

        ]);
//        Session::flash('flash_message', 'تمت اضافة العضو بنجاح');

        return redirect('/Adminpanel/Property')->withFlashMessage('تمت اضافة العضو بنجاح');


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

        return redirect()->route('Property.index')->withFlashMessage('user  deleted successfully' );


    }
    public function showAllEnabel(Property $pro){
        $property= Property::all();

        $proAll = $pro->where('status' , 0)->orderBy('id' , 'desc')->paginate(15);
        return view('welcome' , compact('proAll','property'));
    }

    public function ForRent(Property $pro){
        $property= Property::all();

        $proAll = $pro->where('status' , 0)->where('state' ,0)->orderBy('id' , 'desc')->paginate(15);
        return view('welcome' , compact('proAll','property'));
    }

    public function ForBuy(Property $pro){
        $property= Property::all();

        $proAll = $pro->where('status' , 0)->where('state' ,1)->orderBy('id' , 'desc')->paginate(15);
        return view('welcome' , compact('proAll','property'));
    }

    public function showByType($type , Property $pro){
        $property= Property::all();

        if(in_array($type, ['0' , '1' , '2', '3'])){
            $proAll = $pro->where('status' , 0)->where('type' , $type)->orderBy('id' , 'desc')->paginate(15);
            return view('welcome' , compact('proAll','property'));
        }else{
            return Redirect::back();
        }
    }

}
