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

Route::get('users/change_pass/{id}', 'UsersController@change_pass');
Route::put('users/change_pass_save/{id}', 'UsersController@change_pass_save')->name('users.change_pass_save');

Route::get('invoices/changeAction/{id}/{action_code}/{action_url?}', 'InvoicesController@changeAction')->name('invoices.changeaction');
Route::get('invoices/unfinish', 'InvoicesController@unfinish')->name('invoices.unfinish');
Route::get('invoices/finish', 'InvoicesController@finish')->name('invoices.finish');
Route::get('invoices/return', 'InvoicesController@return')->name('invoices.return');
Route::get('invoices/index/{user_id?}/{action_id?}', 'InvoicesController@index')->name('invoices');
Route::post('invoices/index_lists', 'InvoicesController@index_lists')->name('invoices.index_lists');

Route::resources([
    'users' => 'UsersController',
    'actions' => 'ActionsController',
    'invoices' => 'InvoicesController',
]);


