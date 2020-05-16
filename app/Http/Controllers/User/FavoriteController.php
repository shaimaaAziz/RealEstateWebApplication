<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($property){
        $user = Auth::user();
        $isFavorite = $user->favorite_properties->where('property_id',$property)->count();

        if ($isFavorite == 0)
        {
            $user->favorite_properties()->attach($property);
            // Toastr::success('Post successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_properties()->detach($property);
            // Toastr::success('Post successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }
 
}
