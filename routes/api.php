<?php

use Illuminate\Http\Request;
Use App\Account;
Use App\BlockedDate;
Use App\Booking;
Use App\BookingType;
Use App\Classroom;
Use App\UsersProp;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@create');

Route::get('account', 'AccountsController@index');
Route::get('account/{account}', 'AccountsController@show');
Route::post('account', 'AccountsController@store');
Route::put('account/{account}', 'AccountsController@update');
Route::delete('account/{account}', 'AccountsController@delete');

Route::get('blockeddate', 'BlockedDatesController@index');
//Route::post('blockeddate', 'BlockedDatesController@storez');


Route::post('blockeddate', function(Request $request) {
    return BlockedDate::create($request->all);
});

//Route::get('blockeddate', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return BlockedDate::all();
//});

//Route::get('account', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return BlockedDate::all();
//});