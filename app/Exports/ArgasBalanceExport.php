<?php

namespace App\Exports;

use App\Models\Order_Argas;
use App\Models\Pickslip_Argas;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArgasBalanceExport implements FromCollection
{
	protected $order_id;

    function __construct($order_id) 
    {
    	$this->order_id = $order_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$items = Pickslip_Argas::where('order_id', $this->order_id)->whereColumn('qty', '!=', 'qty_send')->get()->toArray();

    	$results = array();

        foreach ($items as $key => $item) {
        	
        	$bal = $item['qty'] - $item['qty_send'];

        	$results[] = array($item['partno'], $bal);

        }

        return collect($results);
	}
}
