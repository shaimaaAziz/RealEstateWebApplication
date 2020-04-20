<?php

namespace App\Http\Controllers;

use App\cities;
use app\User;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\DataTables as DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user= User::all();
         $city=cities::all();
        return view('admin/user/index',compact('user','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $city=cities::all();
        return view('admin/user/add',compact('city'));
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
            'firstName'=>'required',
            'middleName'=>'required',
            'lastName'=>'required',
            'mobile'=>'required',
            'street'=>'required',
            'city'=>'required',
            'email'=>'required|email',
            'password'=>['required', 'string', 'min:5'],
            
        ]);

        $users = new User();
        $users->create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin' => $request->admin,
           'mobile' =>$request->mobile,
           'street' =>$request->street,
           'city' => $request->city

            ]);

               
            return redirect('/Adminpanel/users')->withFlashMessage('تمت اضافة العضو بنجاح');




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

       return view('admin/user/edit',compact('user'));
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
        $user->fill($request->all())->save();
        // return redirect::back()->withFlashMessage('تم تعديل العضو بنجاح');
        return redirect('/Adminpanel/users')->withFlashMessage('تمت اضافة العضو بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        
        return redirect()->route('users.index')->withFlashMessage('user  deleted successfully' );
     

    }

    // public function anyData(User $user)
    // {

    //   $users = $user->all();

    //     return DataTables::of($users)

    //         ->editColumn('name', function ($model) {
    //             return '<a href="'.url('/Adminpanel/users/' . $model->id . '/edit').'">'.$model->name.'</a>';
    //         })
    //         ->editColumn('admin', function ($model) {
    //             return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
    //         })

            
    //         ->editColumn('control', function ($model) {
    //             $all = '<a href="' . url('/Adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
    //             if($model->id != 1){
    //                 $all .= '<a href="' . url('/Adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
    //             }
    //             return $all;
    //         })
    //         ->make(true);

    // }
}
