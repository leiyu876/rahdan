<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Action;
use App\User;
use Session;
use Auth;

class InvoicesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id = 0, $action_id = 0)
    {
        if(in_array(Auth::user()->name, ['moshin', 'salim', 'alex'])) {
            return redirect('invoices/shop/unfinish');
        } else {
            return redirect('invoices/warehouse/unfinish');
        }

        // delete all bottom
        $query = Invoice::orderBy('created_at', 'desc');
        $data['user_id_selected'] = null;
        
        if($user_id) {
            $query->where('user_id', $user_id);
            $data['user_id_selected'] = $user_id;

        } else $data['user_id_selected'] = null;

        if($action_id) {
            $query->where('action_id', $action_id);
            $data['action_id_selected'] = $action_id;

        } else $data['action_id_selected'] = null;

        $data['invoices'] = $query->get();
        
        $data['page_title'] = 'Fatora All';

        //$data['invoices'] = Invoice::where('','')->orderBy('date', 'desc')->get();
        $data['salesmans'] = User::whereIn('iqama', ['222','333','444'])->pluck('name', 'id');
        $data['actions'] = Action::orderBy('name')->pluck('name', 'id');

        return view('invoices.index', $data);
    }

    public function index_lists(Request $request)
    {
        $user_id   = $request->user_id;
        $action_id = $request->action_id;

        return redirect('invoices/index/'.$user_id.'/'.$action_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create Fatora';

        $data['users'] = User::whereNotIn('iqama', [111, 555])->get();

        return view('invoices.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'partno' => 'required',
            'user_id' => 'required',
            'date' => 'nullable|date',
            'qty' => 'nullable|integer',
        ]);

        $invoice = new Invoice;

        $invoice->partno = $request->input('partno');
        $invoice->user_id = $request->input('user_id');
        $invoice->date = dateViewToDB($request->input('date'));
        $invoice->qty = $request->input('qty') ? $request->input('qty') : 1;

        $action = Action::where('code', 'unfinish')->first();

        if($action === null)
        return redirect('invoices/warehouse/unfinish')->with('error', 'Cannot add fatora. Fatora action not configured. Please contact administrator');

        $invoice->action_code = $action->code;
        
        $invoice->save();

        return redirect('invoices/warehouse/unfinish/')->with('success', 'Fatora Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $action_url)
    {
        $data['page_title'] = 'Update Fatora';
        $data['action_url'] = $action_url;
        $data['invoice'] = Invoice::find($id);
        $data['users'] = User::whereNotIn('iqama', [111, 555])->get();

        return view('invoices.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'partno' => 'required',
            'user_id' => 'required',
            'date' => 'nullable|date',
            'qty' => 'nullable|integer',
        ]);
        
        $invoice = Invoice::find($id);

        $invoice->partno = $request->input('partno');
        $invoice->user_id = $request->input('user_id');
        $invoice->date = dateViewToDB($request->input('date'));
        $invoice->qty = $request->input('qty') ? $request->input('qty') : 1;
        
        $invoice->save();

        return redirect('invoices/warehouse/'.$request->action_url)->with('success', 'Fatora Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('invoices/warehouse/'.$request->action_url)->with('success', 'Fatora Removed');
    }

    public function changeAction($id, $action_code, $action_url = null, $location = 'warehouse') {

        $action = Action::where('code', $action_code)->first();

        if($action) {

            $invoice = Invoice::find($id);            

            $invoice->action_code = $action->code;

            $invoice->save();

            Session::flash('success', $invoice->partno.' move to '.$action->name);
        
        } else {

            Session::flash('error', 'Please contact administrator to authorize you for this action.');
        }

        $url = '';

        if($action_url)
            $url = '/'.$action_url;

        return redirect('invoices/'.$location.'/'.$action_url);
    }

    /*
    public function del_unfinish() {
        
        $data['page_title'] = 'Fatora Unfinish ( Bagi )';

        $data['invoices'] =  Invoice::whereHas('action', function($query){
            $query->whereCode('unfinish');  
        })->get();  

        return view('invoices.unfinish', $data);
    }

    public function del_finish() {
        
        $data['page_title'] = 'Fatora Finish ( Kalas )';

        $data['invoices'] =  Invoice::whereHas('action', function($query){
            $query->whereCode('finish');  
        })->get();  

        return view('invoices.finish', $data);
    }

    public function del_return() {
        
        $data['page_title'] = 'Fatora Return ( Radja )';

        $data['invoices'] =  Invoice::whereHas('action', function($query){
            $query->whereCode('return');  
        })->get();  

        return view('invoices.return', $data);
    }
    */
    public function warehouse($action_code, $user_id = 0)
    {
        $where_in = array();

        switch ($action_code) {
            case 'finished_confirm':
                $data['action_url'] = $action_code;
                $where_in = array($action_code);
                $data['page_title'] = 'Fatora Finished ( Kalas )';
                break; 
            case 'returned_confirm':
                $data['action_url'] = $action_code;
                $where_in = array($action_code);
                $data['page_title'] = 'Parts Returned ( Radja )';
                break;            
            default: 
                $data['action_url'] = 'unfinish';
                $where_in = array('unfinish', 'finished', 'returned');
                $data['page_title'] = 'Fatora Unfinish ( Bagi )';
                break; 
                break;
        }

        $query = Invoice::orderBy('created_at', 'desc')->whereIn('action_code', $where_in);
        $data['user_id_selected'] = null;
        
        if($user_id) {
            $query->where('user_id', $user_id);
            $data['user_id_selected'] = $user_id;

        } else $data['user_id_selected'] = null;


        $data['invoices'] = $query->get();
          
        $data['action_code'] = 'unfinish';

        $data['salesmans'] = User::whereIn('iqama', ['222','333','444'])->pluck('name', 'id');

        return view('invoices.warehouse_index', $data);
    }

    public function warehouse_lists(Request $request)
    {
        $user_id   = $request->user_id;

        return redirect('invoices/warehouse/'.$request->action_code.'/'.$user_id);
    }

    public function shop($action_code)
    {
        $where_in = array();

        switch ($action_code) {
            case 'finished':
                $data['action_url'] = $action_code;
                $where_in = array($action_code);
                $data['page_title'] = 'Fatora Finished ( Kalas )';
                break; 
            case 'returned':
                $data['action_url'] = $action_code;
                $where_in = array($action_code);
                $data['page_title'] = 'Parts Returned ( Radja )';
                break;            
            default: 
                $data['action_url'] = 'unfinish';
                $where_in = array('unfinish', 'finish', 'return');
                $data['page_title'] = 'Fatora Unfinish ( Bagi )';
                break; 
                break;
        }

        $query = Invoice::orderBy('created_at', 'desc')->whereIn('action_code', $where_in);
        
        $data['invoices'] = $query->get();
          
        $data['action_code'] = 'unfinish';

        return view('invoices.shop_index', $data);
    }
}
