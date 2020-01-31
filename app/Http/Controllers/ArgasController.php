<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PickslipImport;
use App\Models\Order_Argas;
use App\Models\Pickslip_Argas;
use DateTime;
use Auth;
use App\Exports\ArgasBalanceExport;
use App\Exports\ArgasReadyExport;
use App\Exports\DeliveryNoteExport;
use App\Exports\ArgasReadyAndBalanceExport;
use App\Exports\ArgasBalanceAllExport;

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
        $data['page_title'] = 'Argas Balance';

        $data['pickslips'] = Pickslip_Argas::whereRaw('qty != qty_send')->get();

        return view('argas.index', $data);
    }

    public function all()
    {
        $d['page_title'] = 'Argas All';

        $d['orders'] = Order_Argas::where('status', '!=', 'INVOICED')->get();
        
        return view('argas.orders', $d);
    }


    public function new()
    {
        $data['page_title'] = 'Argas New';

    	$data['orders'] = Order_Argas::where('status', '!=', 'INVOICED')->where('status', '!=', 'OLD')->where('status', '!=', 'DONE')->get();
        
        return view('argas.new', $data);
    }

    public function old()
    {
        $data['page_title'] = 'Argas old';

        $data['orders'] = Order_Argas::where('status', 'OLD')->get();
        
        return view('argas.new', $data);
    }

    public function done()
    {
        $data['page_title'] = 'Argas Done';

        $data['orders'] = Order_Argas::where('status', 'DONE')->get();
        
        return view('argas.new', $data);
    }

    public function edit(Order_Argas $order_argas)
    {
        $data['page_title'] = 'Delivery Status';

        $data['order'] = $order_argas;
        $data['pickslips'] = Pickslip_Argas::where('order_id', $order_argas->id)->get();
        /*
        // emergency report
        $items = Pickslip_Argas::where('order_id', $order_argas->id)->orderBy('partno')->get();
        foreach ($items as $item) {
            //echo $item->partno.'&nbsp;'.$item->qty.'&nbsp;'.$item->qty_send.'<br/>';
            echo ($item->qty-$item->qty_send).'<br/>';
        }
        exit;
        // end of emergency report
        */

        return view('argas.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $balance_change = false;

        foreach ($request->input() as $pickslip_id => $amount) {
            if ($pickslip_id < 1 || $amount === null || $amount === "0") continue;
            
            $pickslip = Pickslip_Argas::find($pickslip_id);

            // amount + qty send
            //$pickslip->qty_send += $amount;
            $pickslip->qty_ready += $amount;

            $pickslip->update();

            $balance_change = true;
        }

        $order = Order_Argas::find($id);

        if($order->balance() == 0) 
            $order->status = 'READY';            
        elseif($balance_change)
            $order->status = 'NEW';
        
        $order->update();
        
        return redirect()->back()->with('success', 'Balance Updated');
    }

    /*
        Only update the comments in argas balance view
    */
    public function balance_update(Request $request)
    {
        $comments    = $request->input()['comments'];
        $pickslip_id = $request->input()['id'];

        $pickslip = Pickslip_Argas::find($pickslip_id);

        $pickslip->comments = $comments ? $comments : '-';

        $pickslip->update();

        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function send($id)
    {
        $order = Order_Argas::find($id);

        if($order->balance() == 0) 
            $order->status = 'DONE';
        else {
            $order->status = 'OLD';
        }

        $items = Pickslip_Argas::where('order_id', $order->id)->get();
        
        foreach ($items as $item) {
            $item->qty_send += $item->qty_ready;
            $item->qty_ready = 0;
            $item->update();
        }
        
        $order->update();

        return redirect('/argas/new')->with('success', 'Parts Send');   
    }

    public function destroy(Order_Argas $order)
    {
    	Pickslip_Argas::where('order_id', $order->id)->delete();
    	
    	$order->delete();
        
        return redirect('argas/new')->with('success', 'Pickslip Remove.');
    }

    public function import()
    {
        $data['page_title'] = 'Import Pickslip';

        return view('argas.import', $data);
    }

    public function balance_print($order_id)
    {
        //$order = new ArgasBalanceExport($order_id);
        //dd($order->collection());

        return Excel::download(new ArgasBalanceExport($order_id), 'argasbalance.xlsx');
    }

    public function delivery_note($order_id)
    {
        return Excel::download(new DeliveryNoteExport($order_id), 'deliverynote.xlsx');
    }

    public function ready_print($order_id)
    {
        return Excel::download(new ArgasReadyExport($order_id), 'argasready.xlsx');
    }

    public function ready_balance_print($order_id)
    {
        return Excel::download(new ArgasReadyAndBalanceExport($order_id), 'argasreadybalance.xlsx');
    }

    public function balance_print_all() 
    {
        return Excel::download(new ArgasBalanceAllExport(), 'argasbalanceall.xlsx');
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
            $pickslip->comments = '-';
	        
	        $pickslip->save();
		}

        return redirect('argas/new')->with('success', 'New Pickslip Added.');
    }

    public function revert_create(Pickslip_Argas $pickslip_argas)
    {   
        $d['page_title'] = 'Reverting Quantity';

        $d['pickslip_argas'] = $pickslip_argas;

        return view('argas.revert_create', $d);
    }

    public function revert_store(Request $request, Pickslip_Argas $pickslip_argas)
    {
        $data = $request->validate([
            'qty' => 'required'
        ]);

        $pickslip_argas->qty_ready -= $data['qty'];

        $pickslip_argas->update();

        $order = Order_Argas::where('id', $pickslip_argas->order_id)->first();

        $order->status = 'READY';

        $order->update();

        return redirect()->route('order.edit', $pickslip_argas->order_id)->with('success', 'Successfully Revert');
    }

    public function invoice_store(Order_Argas $order_argas)
    {
        $order_argas->status = "INVOICED";        
        
        $order_argas->update();

        return redirect()->route('argas.done')->with('success', 'Order move to Invoiced.');  
    }

    public function invoiced()
    {
        $d['page_title'] = 'This was posted on the System';

        $d['orders'] = Order_Argas::where('status', 'INVOICED')->get();
        
        return view('argas.orders', $d);
    }
}
