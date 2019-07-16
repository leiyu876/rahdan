<?php

namespace App\Exports;

use App\Models\Order_Argas;
use App\Models\Pickslip_Argas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ArgasReadyExport implements FromCollection, ShouldAutoSize, WithEvents
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
    	$items = Pickslip_Argas::where('order_id', $this->order_id)
            ->where('qty_ready', '!=', 0)
            ->get()
            ->toArray();

    	$results = array();

        foreach ($items as $key => $item) {
        	
            $results[] = array($item['partno'], $item['qty_ready']);
        }

        return collect($results);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:A38')->getFont()->setSize(40);
                $event->sheet->getDelegate()->getStyle('B1:B38')->getFont()->setSize(40);
            },
        ];
    }
}
