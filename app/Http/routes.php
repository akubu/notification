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
Route::group(['middleware' => 'redirect'], function() {
   
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::post('/auth/vtiger/user', 'Auth\AuthController@validateVtigerUser');


Route::get('/welcomeError', function () {
    return view('welcomeError');
});

Route::get('/clearNotification','notifications@clearNotification');
Route::get('/logout','Auth\AuthController@logout');
Route::get('/loginNotification','notifications@onLogin');
Route::get('/userHome','user@index');
Route::get('getNotification','notifications@getNotification');

Route::group(['middleware' => 'auth'], function()
{
    Route::post('/upload','user@upload');
    Route::get('/sendMessage','SocketController@sendMessage');
    Route::get('/test','user@listen');

});



$s='social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);