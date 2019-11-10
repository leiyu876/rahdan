<?php

namespace App\Http\Controllers;

use App\Models\Short_part;
use App\Models\Short_part_detail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ShortpartsController extends Controller
{   
    // This was commented because of axios request 401 error. Dont have any solution for now
    /*
    public function __construct() {

        $this->middleware('auth');
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Short Parts Lists';

        $data['shortparts'] = Short_part::where('status', '!=', 'DONE')->orWhereNull('status')->get();

        return view('shortparts.index', $data);
    }

    public function byPartnumbers()
    {
        $data['page_title'] = 'Short Parts Lists via Part Numbers';

        $data['shortparts'] = Short_part::where('status', '!=', 'DONE')->orWhereNull('status')->get();

        return view('shortparts.bypartnumbers', $data);   
    }

    public function finish(Short_part $shortpart)
    {
        $shortpart->status = 'DONE';

        $shortpart->update();

        return redirect()->back();   
    }

    public function finish_lists()
    {
        $data['page_title'] = 'Short Parts Lists that are Finish already';

        $data['shortparts'] = Short_part::where('status', '=', 'DONE')->get();

        return view('shortparts.finish', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create New Short Parts';

        $data['suppliers'] = Supplier::all();

        return view('shortparts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function shortparts_submit(Request $request)
    {
        $short_part = new Short_part;

        $short_part->supplier_id = $request->input('supplier');
        $short_part->invoicedate_supplier = $request->input('supplier_date');
        $short_part->invoicenum_supplier = $request->input('supplier_invoice_num');
        $short_part->invoicenum_rahdan = $request->input('rahdan_invoice_num');
        
        $short_part_id = $short_part->save();

        foreach ($request->input('details') as $v) {
        
            $detail = new Short_part_detail;

            $detail->short_part_id = $short_part->id;
            $detail->partno = strtoupper($v['partno']);    
            $detail->request = $v['request'];    
            $detail->received = $v['received'];    
            $detail->price = $v['price'];    
            $detail->discount = $v['discount'];   

            $detail->save(); 
        }

        return 'ok';
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function show(Short_part $short_part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function edit(Short_part $shortpart)
    {
        $data['short_part'] = $shortpart;   
        
        $data['page_title'] = 'Updating Short Parts';

        $data['suppliers'] = Supplier::all();

        return view('shortparts.edit', $data);
    }

    public function shortparts_update(Request $request, Short_part $short_part)
    {
        $d = $request->data;

        $short_part->supplier_id = $d['supplier'];
        $short_part->invoicedate_supplier = $d['supplier_date'];
        $short_part->invoicenum_supplier = $d['supplier_invoice_num'];
        $short_part->invoicenum_rahdan = $d['rahdan_invoice_num'];
        
        $short_part->update();

        Short_part_detail::where('short_part_id', $short_part->id)->delete();

        foreach ($d['details'] as $v) {
        
            $detail = new Short_part_detail;

            $detail->short_part_id = $short_part->id;
            $detail->partno = strtoupper($v['partno']);    
            $detail->request = $v['request'];    
            $detail->received = $v['received'];    
            $detail->price = $v['price'];    
            $detail->discount = $v['discount'];   

            $detail->save(); 
        }

        return 'ok';
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Short_part $short_part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Short_part $shortpart)
    {
        $shortpart->delete();
        
        return back()->with('success', 'Short Part Removed');
    }
}
