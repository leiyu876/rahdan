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

Route::view('/', 'pages.index');
Route::view('/contact', 'pages.contact');
Route::view('/carwheels', 'pages.carwheels');
Route::view('/carlights', 'pages.carlights');
Route::view('/carbumpers', 'pages.carbumpers');
Route::view('/caradsystem', 'pages.caradsystem');
Route::view('/truckbumpers', 'pages.truckbumpers');
Route::view('/singlepage', 'pages.singlepage');
Route::view('/about', 'pages.about');

Route::get('phpinfo', function() {
	echo phpinfo();
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('users/change_pass/{id}', 'UsersController@change_pass');
Route::put('users/change_pass_save/{id}', 'UsersController@change_pass_save')->name('users.change_pass_save');

Route::get('invoices/changeAction/{id}/{action_code}/{action_url?}/{location?}', 'InvoicesController@changeAction')->name('invoices.changeaction');
//Route::get('invoices/unfinish', 'InvoicesController@unfinish')->name('invoices.unfinish');
//Route::get('invoices/finish', 'InvoicesController@finish')->name('invoices.finish');
//Route::get('invoices/return', 'InvoicesController@return')->name('invoices.return');
//Route::get('invoices/index/{user_id?}/{action_id?}', 'InvoicesController@index')->name('invoices');
//Route::post('invoices/index_lists', 'InvoicesController@index_lists')->name('invoices.index_lists');

Route::get('users/export', 'UsersController@export');
Route::get('users/import', 'UsersController@import')->name('users.import');
Route::post('users/importrun', 'UsersController@importrun')->name('users.importrun');

Route::group(['middleware' => ['auth']], function () {
    
	Route::resources([
	    'users' => 'UsersController',
	    'actions' => 'ActionsController',
	    'partnumbers' => 'PartnumbersController',
	    'permission' => 'PermissionController',
	    'role' => 'RoleController',
	    //'invoices' => 'InvoicesController',
	]);
});



Route::get('invoices/create', 'InvoicesController@create')->name('invoices.create');
Route::post('invoices', 'InvoicesController@store')->name('invoices.store');
Route::get('invoices/warehouse/{action_code}/{user_id?}', 'InvoicesController@warehouse')->name('invoices.warehouse');
Route::post('invoices/warehouse_lists', 'InvoicesController@warehouse_lists')->name('invoices.warehouse_lists');
Route::get('invoices', 'InvoicesController@edit')->name('invoices.edit');
Route::delete('invoices/{invoices}', 'InvoicesController@destroy')->name('invoices.destroy');
Route::get('invoices/{invoice}/edit/{action_url}', 'InvoicesController@edit')->name('invoices.edit');
Route::put('invoices/{invoice}', 'InvoicesController@update')->name('invoices.update');
Route::get('invoices/shop/{action_code}', 'InvoicesController@shop')->name('invoices.shop');

Route::get('argas/new', 'ArgasController@new')->name('argas.new');
Route::delete('argas/destroy/{order}', 'ArgasController@destroy')->name('argas.destroy');
Route::get('argas/import', 'ArgasController@import')->name('argas.import');
Route::post('argas/importrun', 'ArgasController@importrun')->name('argas.importrun');

//delete this one, just testing
Route::get('pai', function() {
	
	$data = array('leo', 'gwapo');

	return json_encode($data);
});

