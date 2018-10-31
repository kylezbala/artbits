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

Route::get('/home', 'UserController@index');

Route::get('/events', 'EventController@index');
Route::get('/events/create', 'EventController@create');
Route::post('/events', 'EventController@store');
Route::get('/events/{id}', 'EventController@edit');
Route::put('/events/{id}/save', 'EventController@update');

Route::post('/commissions/accept', 'CommissionController@accept');
Route::get('/commissions', 'CommissionController@index');
Route::get('/commissions/create', 'CommissionController@create');
Route::post('/commissions', 'CommissionController@store');
Route::get('/commissions/{id}', 'CommissionController@edit');
Route::put('/commissions/{id}/save', 'CommissionController@update');

Route::get('/register', function () {
    return view('register');
});
Route::get('/display/{id}', function ($id) {

    $art = \App\Art::find($id);
    return view('show', ['art' => $art]);
});
Route::get('/profile', function () {

    $art = \App\Art::all()->where('user_id','=', session('user')['id']);

    return view('profile', ['art' => $art]);
});
Route::post('/register', 'UserController@store');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@store');

Route::get('/upload', 'ArtController@create');
Route::post('/upload', 'ArtController@store');

Route::get('/logout', function () {
    session()->flush();
    return redirect('/home');
});

Route::get('/admin', 'AdminController@index');
Route::post('/change_status', 'AdminController@changestatus');