<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');



// Route::post('/search', 'BuController@search');

Route::group(['middleware'=>['can:manage-users'] , 'namespace' => 'Admin', 'prefix' => 'admin'],function(){
 // @datatable
    // Route::get('/Adminpanel/users/data' ,['as ' =>'Adminpanel.users.data' , 'uses' =>'UsersController@anyData']);
 // @admin
    Route::get('/Adminpanel','AdminController@index');

    // @users
    Route::resource('/Adminpanel/users','UsersController');
    Route::resource('/Adminpanel/Property','PropertyController');
    
    // favorite property
    Route::resource('/favorite', 'favoriteController');
    
    

// welcome
   Route::get('/ShowAllBullding' , 'PropertyController@showAllEnabel');
   Route::get('/ForRent' , 'PropertyController@ForRent');
   Route::get('/ForBuy' , 'PropertyController@ForBuy');
   Route::get('/type/{type}' , 'PropertyController@showByType');
});

//favorite controller 
route::group(['middleware'=>['auth'] ,'namespace' => 'user', 'prefix' => 'user'],function(){

   Route::post('/favorite/{property}/add', 'favoriteController@add')->name('property.favorite');

});



//Route::group(['middleware'=>['web','owner'] , 'namespace' => 'Owner', 'prefix' => 'owner'],function(){

   //  Route::resource('/Ownerpanel/users','Owner\UsersController');
   //  Route::resource('/Ownerpanel/Property','Owner\PropertyController');

//});
