<?php

namespace App\Http\Controllers;

use App\Models\Partnumber;
use Illuminate\Http\Request;

class PartnumbersController extends Controller
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
        $data['page_title'] = 'Part Numbers Lists';

        $data['partnumbers'] = Partnumber::all();

        return view('partnumbers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create New Part Number';

        return view('partnumbers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'agencynum' => 'required|unique:partnumbers',
            'rahdannum' => 'required|unique:partnumbers',
        ]);

        $partnumber = new Partnumber;

        $partnumber->agencynum = strtoupper($request->input('agencynum'));
        $partnumber->rahdannum = strtoupper($request->input('rahdannum'));
        
        $partnumber->save();

        return redirect('/partnumbers')->with('success', 'Part Number Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnumber  $partnumber
     * @return \Illuminate\Http\Response
     */
    public function show(Partnumber $partnumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partnumber  $partnumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnumber $partnumber)
    {
        $data['partnumber'] = $partnumber;   
        
        $data['page_title'] = 'Update Part Number';

        return view('partnumbers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partnumber  $partnumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnumber $partnumber)
    {
        $request->validate([
            'agencynum' => 'required|unique:partnumbers,agencynum,'.$partnumber->id,
            'rahdannum' => 'required|unique:partnumbers,rahdannum,'.$partnumber->id,
        ]);

        $partnumber->agencynum = strtoupper($request->input('agencynum'));
        $partnumber->rahdannum = strtoupper($request->input('rahdannum'));

        $partnumber->save();

        return redirect('/partnumbers')->with('success', 'Part Numbers Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnumber  $partnumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnumber $partnumber)
    {
        $partnumber->delete();
        
        return back()->with('success', 'Part Number Removed');
    }
}
