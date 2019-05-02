<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PickslipImport;
use App\Models\Order_Argas;
use App\Models\Pickslip_Argas;
use DateTime;

class ArgasController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('argas/new');
    }

    public function new()
    {
    	$data['page_title'] = 'Argas New';

    	$data['orders'] = Order_Argas::all();
    	
        return view('argas.new', $data);
    }

    public function import()
    {
        $data['page_title'] = 'Import Pickslip';

        return view('argas.import', $data);
    }

    public function importrun(Request $request)
    {
    	$request->validate([
            'file' => 'required'
        ]);
 
        $excel = Excel::toCollection(new PickslipImport(), $request->file);
        
        $count = count($excel[0]);
        $num_date = $excel[0][4];
        
        $pickslip_total = str_replace("Total Amount :     ", "", $excel[0][$count-5][0]);
        $pickslip_total = str_replace(",", "", $pickslip_total);
        $pickslip_num   = str_replace("Delivery Note No. : ", "", $num_date[0]);
        $pickslip_date  = str_replace("Date : ", "", $num_date[4]);
		$pickslip_date  = DateTime::createFromFormat('d/m/Y', $pickslip_date);
        
        $order = new Order_Argas;

        $order->pickslip_id = $pickslip_num;
        $order->total       = (double)$pickslip_total;
        $order->date        = $pickslip_date->format('Y-m-d');
        $order->status      = 'NEW';
        
        $order->save();
        
        foreach ($excel[0] as $k => $v) {

		   	if ($k < 9) continue;
		   	if ($k > ($count-7)) continue;

		   	$pickslip = new Pickslip_Argas;

	        $pickslip->order_id = $order->id;
	        $pickslip->partno = $v[1];
	        $pickslip->description = $v[2];
	        $pickslip->qty = $v[4];
	        $pickslip->qty_send = 0;
	        
	        $pickslip->save();
		}

        return redirect('argas/new')->with('success', 'New Pickslip Added.');
    }
}
