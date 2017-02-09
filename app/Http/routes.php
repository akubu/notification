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

//new
Route::get('testimonials',function (){
    return view('anniversary.testimonials');
});
Route::get('videos','youtubeController@index2');
Route::get('getTestimonials','reactNative@getTestimonials');
Route::get('uploadTemplate',function (){
   return view('uploadTemplate');
});
Route::post('saveTestimonialsWithPhoto','reactNative@saveTestimonialsWithPhoto');
Route::post('saveTestimonials','reactNative@saveTestimonials');
Route::get('testimonialTemplate',function (){
   return view('testimonialTemplate');
});
Route::post('/videoUpload','reactNative@upload');
Route::get('/react-native','reactNative@insert');
Route::get('/react-native/get','reactNative@getNotes');
Route::get('/react-native/delete','reactNative@delete');
Route::get('/youtube','youtubeController@index');
/////////


Route::post('/auth/vtiger/user', 'Auth\AuthController@validateVtigerUser');

Route::get('/test',function (){
   return view('test'); 
});
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
//    Route::get('/test','user@listen');

});



$s='social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);