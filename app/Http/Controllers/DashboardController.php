<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pickslip_Argas;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Dashboard';

        $data['top_qty'] =  Pickslip_Argas::groupBy('partno')
           ->selectRaw('partno, sum(qty) as qty')
           ->orderBy('qty', 'desc')
           ->take(10)
           ->get();

        $data['users_count'] = User::all()->count();

        return view('dashboard', $data);
    }
}
