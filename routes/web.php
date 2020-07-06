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
   Route::get('/personalPage/properties', 'PropertyReviewController@userRating')->name('userRating');


   // for user to rate a property 
  Route::post('/personalPage/properties', 'PropertyReviewController@postProperty')->name('properties.post');
  Route::post('/personalPage/propertiesPersonal', 'PropertyReviewController@postPropertyforPersonal')->name('propertiesPersonalRating');

  
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

    Route::get('propertiesRate', 'PropertyController@rating')->name('properties.rating');


// welcome
   
});

//favorite controller 
route::group(['middleware'=>['auth'] ,'namespace' => 'user', 'prefix' => 'user'],function(){

   Route::post('/favorite/{property}/add', 'favoriteController@add')->name('property.favorite');
});






//when the owner login
Route::group(['middleware'=>['can:owner'] , 'namespace' => 'Owner', 'prefix' => 'owner'],function(){
   // Route::get('/Ownerpanel/users/{id}','UsersController@show');
    Route::resource('/Ownerpanel/users','UsersController');
    Route::resource('/Ownerpanel/Property','PropertyController');

});
