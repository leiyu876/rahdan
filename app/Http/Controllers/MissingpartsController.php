<?php

namespace App\Http\Controllers;

use App\Models\Missing_part;
use Illuminate\Http\Request;

class MissingpartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Missing Spare Parts';

        $data['missing_parts'] = Missing_part::all();

        return view('missingparts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Missing_part  $missing_part
     * @return \Illuminate\Http\Response
     */
    public function show(Missing_part $missing_part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Missing_part  $missing_part
     * @return \Illuminate\Http\Response
     */
    public function edit(Missing_part $missing_part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Missing_part  $missing_part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Missing_part $missing_part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Missing_part  $missing_part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Missing_part $missing_part)
    {
        //
    }
}
