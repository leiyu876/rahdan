<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Action;
use App\User;
use Session;

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
    public function index()
    {
        $invoices = Invoice::orderBy('date', 'desc')->get();

        return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return redirect('/invoices')->with('error', 'Cannot add fatora. Fatora action not configured. Please contact administrator');

        $invoice->action_id = $action->id;
        
        $invoice->save();

        return redirect('/invoices')->with('success', 'Fatora Created');
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
    public function edit($id)
    {
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

        return redirect('/invoices')->with('success', 'Invoice Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('/invoices')->with('success', 'Fatora Removed');
    }

    public function changeAction($id, $action_code, $action_url = null) {

        $action = Action::where('code', $action_code)->first();

        if($action) {

            $invoice = Invoice::find($id);            

            $invoice->action_id = $action->id;

            $invoice->save();

            Session::flash('success', $invoice->partno.' '.$action->name);
        
        } else {

            Session::flash('error', 'Please contact administrator to authorize you for this action.');
        }

        $url = '';

        if($action_url)
            $url = '/'.$action_url;

        return redirect('/invoices'.$url);
    }

    public function unfinish() {
        
        $invoices =  Invoice::whereHas('action', function($query){
            $query->whereCode('unfinish');  
        })->get();  

        return view('invoices.unfinish', ['invoices' => $invoices]);
    }

    public function finish() {
        
        $invoices =  Invoice::whereHas('action', function($query){
            $query->whereCode('finish');  
        })->get();  

        return view('invoices.finish', ['invoices' => $invoices]);
    }

    public function return() {
        
        $invoices =  Invoice::whereHas('action', function($query){
            $query->whereCode('return');  
        })->get();  

        return view('invoices.return', ['invoices' => $invoices]);
    }
}
