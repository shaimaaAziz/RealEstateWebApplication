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
            'messageType'=>'required',
            'message'=>'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;


        if( $request->messageType == 1){
            $contact->messageType = "اقتراح";
        }elseif( $request->messageType == 2){
            $contact->messageType = "إعجاب";
        }elseif( $request->messageType == 3){
            $contact->messageType = "مشكلة";
        }elseif( $request->messageType == 4){
            $contact->messageType = "أخرى";
        }

        $contact->message = $request->message;
        $contact->view = false;
        $contact->save();


       Toastr::success(' نشكرك لتواصلك . تم ارسال الرسالة بنجاح ');

        return redirect()->back();
}
}
