<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Auditlog;

Route::get('home', 'UserController@index');

Route::get('verify/{code}', 'UserController@verify');
Route::get('send/{email}', 'UserController@send');


Route::get('message/{id}/{receiver}/{sender}', 'MessageController@index');
Route::post('message/send', 'MessageController@send');

Route::get('auction', 'AuctionController@create');
Route::get('auction/create', 'AuctionController@create');
Route::post('auction/create', 'AuctionController@store');


Route::post('order', 'CheckoutController@order');
Route::post('checkout', 'CheckoutController@checkout');
Route::post('processing', 'CheckoutController@processing');
Route::get('confirmed', 'CheckoutController@confirmed');

Route::get('events', 'EventController@index');
Route::get('events/create', 'EventController@create');
Route::post('events', 'EventController@store');
Route::get('events/{id}', 'EventController@edit');
Route::put('events/{id}/save', 'EventController@update');

Route::post('commissions/accept', 'CommissionController@accept');
Route::get('commissions', 'CommissionController@index');
Route::get('commissions/create', 'CommissionController@create');
Route::post('commissions', 'CommissionController@store');
Route::get('commissions/{id}', 'CommissionController@edit');
Route::put('commissions/{id}/save', 'CommissionController@update');

Route::get('register', function () {
    return view('register');
});
Route::get('display/{id}', function ($id) {

    $art = \App\Art::find($id);
    return view('show', ['art' => $art]);
});
Route::get('profile', function () {

    $art = \App\Art::all()->where('user_id','=', session('user')['id']);

    return view('profile', ['art' => $art]);
});
Route::post('register', 'UserController@store');

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@store');

Route::get('upload', 'ArtController@create');
Route::post('upload', 'ArtController@store');

Route::get('logout', function () {
    //Audit log
    $audit = new Auditlog();
    $audit->user_id = session('user')['id'];
    $audit->activity = 'User has logged Out';
    $audit->save();

    session()->flush();
    return redirect('/home');
});

Route::get('admin', 'AdminController@index');
Route::get('auditlog', function (){
//Audit log
    $auditlog = new auditlog();
    $log = $auditlog->orderBy('id', 'DESC')->get();
   return view('admin.auditlog', compact('log'));

});
Route::post('change_status', 'AdminController@changestatus');

