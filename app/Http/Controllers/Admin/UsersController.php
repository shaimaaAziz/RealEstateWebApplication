<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Role;
use app\User;
use Gate;

use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables as DataTables;
use Faker\Provider\ar_JO\Company;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   
     public function __construct(){
    //     if(Gate::denies('edit-users')){
    //             return redirect(route('users.index'));
    //         }
    $this->middleware('auth');
    }


    public function index()
    {
        //  $users= User::all();
        //  $user = User::with('roles')->where('name' ,'!=', 'أدمن')->get();
        $user =  User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'أدمن');
        })->get();
        
        // dd($user);
         $city=City::all();
        return view('admin/user/index',compact('user','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $roles = Role::all();
        $city=City::all();
        $user = new User();
        return view('admin/user/add',compact('city' , 'roles','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'firstName'=>'required',
        //     'middleName'=>'required',
        //     'lastName'=>'required',
        //     'mobile'=>'required',
        //     'street'=>'required',
        //     'city'=>'required',
        //     'email'=>'required|email',
        //     'password'=>['required', 'string', 'min:5'],
            
        // ]);

        // $user = new User();
        // $user->create([
        //     'firstName' => $request->firstName,
        //     'middleName' => $request->middleName,
        //     'lastName' => $request->lastName,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'admin' => $request->admin,
        //    'mobile' =>$request->mobile,
        //    'street' =>$request->street,
        //    'city' => $request->city

        //     ]);
       
        $user= new User();
        $user->firstName=  $request->firstName;
        $user->middleName=  $request->middleName;
        $user->lastName=  $request->lastName;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->mobile =$request->mobile;
        $user->street =$request->street;
        $user->city =$request->city;

        if($user->save()){
        $request->session()->flash('success',$user->firstName.' تمت إضافته بنجاح');
    }else{
     $request->session()->flash('error',' يوجد هنالك مشكلة في  عملية الإضافة');
    } 

            $user->roles()->attach($request->roles);
          
            return redirect(route('user.index'));




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
    public function edit(User $user)
    {
    //    $user= User::find($id);
    // if(Gate::denies('manage-users')){
    //     return redirect(route('users.index'));
    // }
       $roles = Role::all();
       return view('admin/user/edit',compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user= User::find($id);

       if($user->fill($request->all())->save()){
           $request->session()->flash('success',$user->firstName.'  تم تعديله بنجاح');
       }else{
        $request->session()->flash('error',' يوجد هنالك مشكلة في تعديل العضو');
       }
        // dd($request->roles);
        $user->roles()->sync($request->roles);
        return redirect(route('user.index'));
        // return redirect(route('users.index'))->withFlashMessage('تمت اضافة العضو بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user= User::find($id);
        // if(Gate::denies('manage-users')){
        //     return redirect(route('users.index'));
        // }
        $user->roles()->detach();
        $user->delete();
        
        return redirect()->route('user.index')->withFlashMessage('user  deleted successfully' );
     

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
