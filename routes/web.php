<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/AdminDashboard', 'HomeController@AdminDashboard')->name('adminHome');


// for contact in welcome blade
Route::post('/contact','ContactController@sendMessage')->name('contact.send');

//for user when he login
Route::group(['middleware'=>['can:user'] , 'namespace' => 'User', 'prefix' => 'user'],function(){
     
   Route::get('/personalPage/favorite','userController@favorite');
   Route::resource('/personalPage','userController');

});
// in welcome blade
Route::get('/ShowAllBullding' , 'operationForProperty@showAllEnabel');
   Route::get('/ForRent' , 'operationForProperty@ForRent');
   Route::get('/ForBuy' , 'operationForProperty@ForBuy');
   Route::get('/type/{type}' , 'operationForProperty@showByType');
   Route::post('/search', 'operationForProperty@search');


Route::group(['middleware'=>['can:manage-users'] , 'namespace' => 'Admin', 'prefix' => 'admin'],function(){
 // @datatable
    // Route::get('/Adminpanel/users/data' ,['as ' =>'Adminpanel.users.data' , 'uses' =>'UsersController@anyData']);
 // @admin
   //  Route::get('/Adminpanel','AdminController@index');

    // @users
    Route::resource('/Adminpanel/users','UsersController');
    Route::resource('/Adminpanel/Property','PropertyController');
    
    // favorite property
    Route::resource('/favorite', 'favoriteController');
    
    // contact
    Route::resource('/contact', 'ContactController');


// welcome
   
});

//favorite controller 
route::group(['middleware'=>['auth'] ,'namespace' => 'user', 'prefix' => 'user'],function(){

   Route::post('/favorite/{property}/add', 'favoriteController@add')->name('property.favorite');

});



//Route::group(['middleware'=>['web','owner'] , 'namespace' => 'Owner', 'prefix' => 'owner'],function(){

   //  Route::resource('/Ownerpanel/users','Owner\UsersController');
   //  Route::resource('/Ownerpanel/Property','Owner\PropertyController');

//});
