<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

// Route::get('/ShowAllBullding' , 'propertyController@showAllEnabel');
// Route::get('/ForRent' , 'propertyController@ForRent');
// Route::get('/ForBuy' , 'propertyController@ForBuy');
// Route::get('/type/{type}' , 'propertyController@showByType');

// Route::post('/search', 'BuController@search');

Route::group(['middleware'=>['web','admin'] , 'namespace' => 'Admin', 'prefix' => 'admin'],function(){
 // @datatable
    // Route::get('/Adminpanel/users/data' ,['as ' =>'Adminpanel.users.data' , 'uses' =>'UsersController@anyData']);
 // @admin
    Route::get('/Adminpanel','AdminController@index');

    // @users
    Route::resource('/Adminpanel/users','UsersController');
    Route::resource('/Adminpanel/Property','propertyController');
});