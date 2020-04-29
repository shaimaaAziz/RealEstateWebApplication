<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware'=>['web','admin']],function(){
 // @datatable
    // Route::get('/Adminpanel/users/data' ,['as ' =>'Adminpanel.users.data' , 'uses' =>'UsersController@anyData']);
 // @admin
    Route::get('/Adminpanel','AdminController@index');

    // @users
    Route::resource('/Adminpanel/users','UsersController');
    Route::resource('/Adminpanel/Property','propertyController');



});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
