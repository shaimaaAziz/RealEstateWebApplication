<?php

namespace App\Http\Controllers\Owner;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;
use Storage;

class UsersController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
        }
        
    public function index()
    {
        $user =  Auth::user();
        return view('owner/user/show',compact('user'));


    }
    // public function show($id)
    // {        $user= User::find($id);

    //     return view('owner/user/show',compact('user'));

    // }
    public function edit($id)
    {
        $user= User::find($id);

        return view('owner/user/edit',compact('user'));
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
        $this->validate($request,[
            'firstName'=>'required',
            'middleName'=>'required',
            'lastName'=>'required',
            'mobile'=>'required',
            'street'=>'required',
            'city'=>'required',
            'email'=>'required|email',
            'password'=>['required', 'string', 'min:8'],
            'image' =>'sometimes|image',
        ]);

        $user= User::find($id);
        $user->firstName=  $request->firstName;
        $user->middleName=  $request->middleName;
        $user->lastName=  $request->lastName;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->mobile =$request->mobile;
        $user->street =$request->street;
        $user->city =$request->city;

        if($request->hasFile('image')) {
            //add the new photo
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(100, 200)->save($location);
            $oldFileName = $user->image;
            //update the database
            $user->image = $fileName;
            //delete the old image
            Storage::delete( $oldFileName);
        }
        if($user->save()){
            $request->session()->flash('success',$user->firstName.'  تم تعديله بنجاح');
        }else{
         $request->session()->flash('error',' يوجد هنالك مشكلة في تعديل العضو');
        }
        return redirect('owner/Ownerpanel/users')->withFlashMessage('تمت اضافة العضو بنجاح');


    }
  
    public function create()
    {    }
    public function store(Request $request)
    {    }
    public function destroy($id)
    {}

}
