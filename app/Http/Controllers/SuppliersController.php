<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Input;

class SuppliersController extends Controller
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
        $data['page_title'] = 'Supplier Lists';

        $data['suppliers'] = Supplier::all();

        return view('suppliers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create New Supplier';

        return view('suppliers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            //'code' => 'required|unique:suppliers',
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        if($data['code'] != '2000') {

            $supplier = Supplier::where('code', $data['code'])->count();

            if($supplier) return redirect()->back()->with('error', 'Code already exist.')->withInput(Input::all());
        }       

        Supplier::create($data);

        return redirect()->route('suppliers.index')->with('success', 'Successfully Saved');
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
    public function edit(Supplier $supplier)
    {
        $data['supplier'] = $supplier;   
        
        $data['page_title'] = 'Updating Supplier';

        return view('suppliers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            //'code' => 'required|unique:suppliers,code,'.$supplier->id,
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        if($data['code'] != '2000') {

            $count = Supplier::where('code', $data['code'])->where('id', '!=', $supplier->id)->count();

            if($count) return redirect()->back()->with('error', 'Code already exist.')->withInput(Input::all());
        }  

        $supplier->update($data);

        return redirect()->route('suppliers.index')->with('success', 'Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        
        return back()->with('success', 'Supplier Removed');
    }
}
