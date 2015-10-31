<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//homepage
Route::get('/','HomepageController@index');
Route::get('/faq',function(){
	return view('faq');
});
Route::get('/t&c',function(){
	return view('t&c');
});




//Homepage redirect to login page will either update data or redirect to valentines browse
Route::post('/login','HomepageController@saveUser');



Route::get('/logout',function(){
	$past = time() - 5400;
	foreach ($_COOKIE as $key => $value) {
		setcookie($key,$value,$past,'/');
	}
	return redirect('/');
});

$router->group(['middleware' => 'cook'], function() {

Route::get('/findlove','ValentineController@browse');
Route::get('/profile/edit/','ValentineController@showProfileEditor');

Route::get('/profile/complete/','ValentineController@showCompleteProfile');

Route::post('/completeProfile','ValentineController@updateProfile');



//api end point to get valentine in a specific college 10 at a time
Route::get('/search','ValentineController@search');

//this page shows profile of a person with given id
Route::get('/match/{id}','ValentineController@match');

//This route adds a request for access if request is form both side they are notified
Route::get('/api/access/{id}','ValentineController@getAccess');

//this api end point get and sets notifications array
Route::get('/api/notifications/','ValentineController@getNotifications');
   
});

