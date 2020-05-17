<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($property){
        $user = Auth::user();

        if ($user !== null && $user instanceof User) {
        $isFavorite = $user->favorite_properties()->where('property_id',$property)->count();

        if ($isFavorite == 0)
        {
            $user->favorite_properties()->attach($property);
            Toastr::success('تم الاضافة الي المفضلة بنجاح ');
            return redirect()->back();
        } else {
            $user->favorite_properties()->detach($property);
             Toastr::success('تم الازالة من المفضلة بنجاح  ');
            return redirect()->back();
        }
    }
}
}