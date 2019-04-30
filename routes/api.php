<?php

use Illuminate\Http\Request;

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



//delete this one, just testing
Route::get('pai_get', function() {
	
	$data = array();
	$data['group'] = 'toyota';

	for ($i=0; $i < 5800; $i++) { 
		$data['data'][] = array('partnum_'.$i, 'qty_'.$i);
	}

	return json_encode($data);
});
Route::post('pai_post', function(Request $request) {
	
	set_time_limit(0);

	return 'ok';
});
//---------------------------------
