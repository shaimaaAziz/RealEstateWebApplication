<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');



// for contact in welcome blade
Route::post('/contact','ContactController@sendMessage')->name('contact.send');

// Route::get('/mail','mailController@send')->name('send');

//for user when he login
Route::group(['middleware'=>['can:user'] , 'namespace' => 'User', 'prefix' => 'user'],function(){
     
   Route::get('/personalPage/favorite','userController@favorite');
   Route::get('/personalPage/properties', 'PropertyReviewController@userRating')->name('userRating');
   
   //for user to do reservation
   Route::post('/personalPage/reservation', 'PropertyReviewController@doReservation')->name('properties.reservation');
   //for user to show reservations
   Route::get('/AllMyReservations','userController@showReservations')->name('showReservations');
   Route::resource('/reservationsUser','userController'); // for destroy
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
   Route::get('/showMap', 'operationForProperty@showMap')->name('showMap');

   

Route::group(['middleware'=>['can:manage-users'] , 'namespace' => 'Admin', 'prefix' => 'admin'],function(){
 // @datatable
    // Route::get('/Adminpanel/users/data' ,['as ' =>'Adminpanel.users.data' , 'uses' =>'UsersController@anyData']);
 // @admin
   //  Route::get('/Adminpanel','AdminController@index');
   Route::get('/AdminDashboard', 'AdminController@AdminDashboard')->name('adminHome');
    // @users
    Route::resource('/Adminpanel/user','UsersController');
    Route::resource('/Adminpanel/Properties','PropertyController');
    // favorite property
    Route::resource('/favorite', 'favoriteController');
    // contact
    Route::resource('/contact', 'ContactController');
    Route::post('/Adminpanel/contact/{id}','ContactController@view')->name('contact.view');
   //  Route::get('/Adminpanel/countMessage','ContactController@countMessage')->name('contact.countMessage');
    Route::get('/Adminpanel/unreadMessage','ContactController@unreadMessage')->name('contact.unreadMessage');
    Route::get('propertiesRate', 'PropertyController@rating')->name('properties.rating');
   //for reservations
   Route::get('/Adminpanel/reservations','ReservationController@displayReservations')->name('displayAllReservations');
   Route::post('/Adminpanel/reservations/{id}','ReservationController@agreeOnReservations')->name('reservations');
   // Route::post('/Adminpanel/reservation/{id}','ReservationController@destroy')->name('destroyProperty');
   Route::resource('/reservations', 'ReservationController'); // this just to excute the destroy of property

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
    Route::get('/Ownerpanel/reservations','ReservationController@displayReservations')->name('displayReservation');
    Route::post('/Ownerpanel/reservations/{id}','ReservationController@agreeOnReservations')->name('reservation');
    Route::resource('/reservationsOwner', 'ReservationController'); // this just to excute the destroy of property
   // Route::get('reservations/{id}','ReservationController@destroy')->name('destroyProperty');

    

});

