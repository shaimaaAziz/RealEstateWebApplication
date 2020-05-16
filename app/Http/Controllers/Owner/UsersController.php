<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function show($id)
    {        $user= User::find($id);

        return view('owner/user/show',compact('user'));

    }
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
        $user= User::find($id);
        $user->fill($request->all())->save();

        return redirect('owner/Ownerpanel/users')->withFlashMessage('تمت اضافة العضو بنجاح');


    }
}
