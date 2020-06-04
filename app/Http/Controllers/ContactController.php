<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function sendMessage(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;


        $contact->save();


       Toastr::success(' نشكرك لتواصلك . تم ارسال الرسالة بنجاح ');

        return redirect()->back();
}
}
