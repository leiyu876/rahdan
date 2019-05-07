<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function paypal_client_integration() {

    	$data['page_title'] = 'Sample Paypal Client Integration';

        return view('paypal.clientintegration', $data);
    }

    public function paypal_server_integration() {

    	$data['page_title'] = 'Sample Paypal Server Integration';

        return view('paypal.serverintegration', $data);
    }

    public function paypal_catch_response() {

    	return response()->json(['data' => 'here']);
    }
}
