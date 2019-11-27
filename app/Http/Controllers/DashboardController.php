<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pickslip_Argas;
use App\User;
use App\Models\Supplier;
use App\Models\Missing_part;
use App\Models\Short_part_detail;
use App\Models\Order_Argas;

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

        $data['users_count'] = User::all()->count();

        $data['missingparts_count'] = Missing_part::all()->count();

        $data['short_parts_count'] =  Short_part_detail::whereRaw('request != received')
           ->count();

        $data['suppliers_count'] = Supplier::all()->count();

        $data['argas_balance'] =  Pickslip_Argas::whereRaw('qty != (qty_ready + qty_send)')
           ->count();

        $data['top_qty'] =  Pickslip_Argas::groupBy('partno')
           ->selectRaw('partno, sum(qty) as qty')
           ->orderBy('qty', 'desc')
           ->take(10)
           ->get();

        $data['top_short'] =  Short_part_detail::orderBy('created_at', 'desc')
           ->whereRaw('request != received')
           ->take(10)
           ->get();
        
        $data['latest_argas_balance'] =  Pickslip_Argas::whereRaw('qty != (qty_ready + qty_send)')
           ->orderBy('created_at', 'desc')
           ->take(10)
           ->get();

        $data['latest_missing'] = Missing_part::take(10)
        ->orderBy('created_at', 'desc')
        ->get();

      return view('dashboard', $data);
    }

    public function search(Request $request)
    {
        $data['page_title'] = 'Dashboard';

        $data['partno_search'] = $p = $request->input('partno_search');

        $data['missing'] = Missing_part::where('partno', '=', $p)->first();

        $data['shortpart'] =  Short_part_detail::selectRaw('(sum(request) - sum(received)) as balance')
            ->where('partno', $p)
            ->whereRaw('request != received')->first()->balance;

        $balances      =  Pickslip_Argas::where('partno', $p)->get();
        $data['argas'] = 0;
        foreach ($balances as $k => $v) {

            $order = Order_Argas::where('id', $v->order_id)->where('status', '!=', 'INVOICED')->first();

            if(!is_null($order)) {

                $data['argas'] += $v->qty_ready + $v->qty_send; 
            }
        }

        return view('mix.search', $data);
    }
}
