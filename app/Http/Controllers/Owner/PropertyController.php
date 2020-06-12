<?php

namespace App\Http\Controllers\Owner;

use toastr;

use App\Property;
use App\Http\Requests;
use Illuminate\Http\Request;
use yajra\Datatables\Datables;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index()
    {
        $property= Property::where('adminId',1)->get();

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

        ]);

        $property = new Property();
        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);


        $property->create([
            'type'=> $request->type,
            'minPrice' => $request->minPrice,
            'maxPrice' => $request->maxPrice,
            'roomNumbers' => $request->roomNumbers,
            'state' =>$request->state,
            'description' => $request->description,
            'propertyPeriod' =>$request->propertyPeriod,
            'street' =>$request->street,
            'image' =>$photoName,
            'status' =>'0',
            'city' =>$request->city,
            'area'=>$request->area


        ]);
        toastr()->success('flash_message', 'تمت اضافة العضو بنجاح');

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

        $photoName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$photoName);


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


        $oldFileName = $property->image;
        $property->image = $photoName;
        Storage::delete($oldFileName);


        $property->save();
        toastr()->success('flash_message', 'تمت اضافة العضو بنجاح');

        return redirect('Ownerpanel/Property');


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
