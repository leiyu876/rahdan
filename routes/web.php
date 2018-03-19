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

Route::get('/', function () {
	return view('index');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/carwheels', function () {
    return view('carwheels');
});
Route::get('/carlights', function () {
    return view('carlights');
});
Route::get('/carbumpers', function () {
    return view('carlights');
});
Route::get('/caradsystem', function () {
    return view('caradsystem');
});
Route::get('/truckbumpers', function () {
    return view('truckbumpers');
});
Route::get('/singlepage', function () {
    return view('singlepage');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::resources([
    'users' => 'UsersController',
]);
