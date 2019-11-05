<?php

namespace App\Http\Controllers;

use App\Models\Short_parts;
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

        $data['shortparts'] = Short_parts::all();

        return view('shortparts.index', $data);
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

        $data['shortpart_details'] = array();

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
        dd($request->input());
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function show(Short_parts $short_parts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function edit(Short_parts $short_parts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Short_parts $short_parts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Short_parts  $short_parts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Short_parts $short_parts)
    {
        //
    }
}
