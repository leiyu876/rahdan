<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\User;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::whereNotIn('id', [1, 5])->get();

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

        $date = $request->input('date');
        $date = date("Y-m-d", strtotime($date));

        $invoice = new Invoice;

        $invoice->partno = $request->input('partno');
        $invoice->user_id = $request->input('user_id');
        $invoice->date = $date.' '.date("H:i:s");
        $invoice->qty = $request->input('qty');
        $invoice->action_id = 1;
        
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
        $data['users'] = User::whereNotIn('id', [1, 5])->get();

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

        $date = $request->input('date');
        $date = date("Y-m-d", strtotime($date));

        $invoice->partno = $request->input('partno');
        $invoice->user_id = $request->input('user_id');
        $invoice->date = $date.' '.date("H:i:s");
        $invoice->qty = $request->input('qty');
        
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
}
