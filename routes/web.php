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
	    'suppliers' => 'SuppliersController',
	    //'invoices' => 'InvoicesController',
	    'shortparts' => 'ShortpartsController',
	]);

	Route::prefix('shortparts')->group(function() {
		Route::get('by/partnumbers', 'ShortpartsController@byPartnumbers');
		Route::get('{shortpart}/finish', 'ShortpartsController@finish')->name('shortparts.finish');
		Route::get('status/finish_lists', 'ShortpartsController@finish_lists');
	});

	Route::prefix('invoices')->group(function() {
		Route::get('create', 'InvoicesController@create')->name('invoices.create');
		Route::post('invoices', 'InvoicesController@store')->name('invoices.store');
		Route::get('warehouse/{action_code}/{user_id?}', 'InvoicesController@warehouse')->name('invoices.warehouse');
		Route::post('warehouse_lists', 'InvoicesController@warehouse_lists')->name('invoices.warehouse_lists');
		Route::get('', 'InvoicesController@edit')->name('invoices.edit');
		Route::delete('{invoices}', 'InvoicesController@destroy')->name('invoices.destroy');
		Route::get('{invoice}/edit/{action_url}', 'InvoicesController@edit')->name('invoices.edit');
		Route::put('{invoice}', 'InvoicesController@update')->name('invoices.update');
		Route::get('shop/{action_code}', 'InvoicesController@shop')->name('invoices.shop');
	});

	Route::prefix('argas')->group(function() {
		Route::get('', 'ArgasController@index')->name('argas');
		Route::post('balance/update', 'ArgasController@balance_update')->name('balance_update');
		Route::get('new', 'ArgasController@new')->name('argas.new');
		Route::get('old', 'ArgasController@old')->name('argas.old');
		Route::get('all', 'ArgasController@all')->name('argas.all');
		Route::get('done', 'ArgasController@done')->name('argas.done');
		Route::get('edit/{order_argas}', 'ArgasController@edit')->name('order.edit');
		Route::get('send/{id}', 'ArgasController@send')->name('order.send');
		Route::get('invoice_store/{order_argas}', 'ArgasController@invoice_store')->name('order.invoice.store');
		Route::put('update/{id}', 'ArgasController@update')->name('order.update');
		Route::delete('destroy/{order}', 'ArgasController@destroy')->name('argas.destroy');
		Route::get('import', 'ArgasController@import')->name('argas.import');
		Route::post('importrun', 'ArgasController@importrun')->name('argas.importrun');
		Route::get('balance_print/{order_id}', 'ArgasController@balance_print')->name('argas.balance_print');
		Route::get('ready_print/{order_id}', 'ArgasController@ready_print')->name('argas.ready_print');
		Route::get('ready_balance_print/{order_id}', 'ArgasController@ready_balance_print')->name('argas.ready_balance_print');
		Route::get('balance_print_all', 'ArgasController@balance_print_all')->name('argas.balance_print_all');
		Route::get('revert/{pickslip_argas}', 'ArgasController@revert_create')->name('argas.revert.create');
		Route::post('revert/{pickslip_argas}', 'ArgasController@revert_store')->name('argas.revert.store');	
		Route::get('invoiced', 'ArgasController@invoiced')->name('argas.invoiced');
	});


	//Route::view('/discount_compute', 'pages.discount_compute');
	Route::get('discount_compute', function() {
		$data['page_title'] = 'Discount Compute حساب الخصم';
		return view('pages.discount_compute', $data);
	});
});




Route::get('paypal_client_integration', 'PaypalController@paypal_client_integration')->name('paypal_client_integration');
Route::get('paypal_server_integration', 'PaypalController@paypal_server_integration')->name('paypal_server_integration');
Route::get('paypal_catch_response', 'PaypalController@paypal_catch_response')->name('paypal_catch_response');

//delete this one, just testing
Route::get('pai', function() {
	
	$data = array('leo', 'gwapo');

	return json_encode($data);
});

