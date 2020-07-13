<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\messageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class ContactController extends Controller
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

        $contacts =Contact::all();
        $messageType= messageType::all();
        return view('Contact.index',compact('contacts','messageType'));

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
        $contact=Contact::find($id);
        return view('Contact.show',compact('contact'));

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
        $Contact = Contact::find($id);
        $Contact->delete();
        Toastr::success('تم ازالة الرسالة بنجاح  ');
        return redirect()->back();
    }

    public function view($id)
    {
        $contact = Contact::find($id);
        $contact->view = true;
        $contact->save();

        Toastr::success('تمت العملية بنجاح .','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    } 

    public static function countMessage()
    {
        
        $contactscountMessage  = DB::table('contacts')->where('view' , 0)->get();
        // $contacts =   Contact::where('view', '0')->get();

      return  $contactscountMessage  ;

    //   view('admin.layout.layout',compact('contacts'));
   }
   public static function unreadMessage()
   {
     $contacts =   Contact::where('view', '0')->get();
     return  view('Contact.index',compact('contacts'));
  }

  


}