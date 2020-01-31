<?php

namespace App\Exports;

use App\Models\Pickslip_Argas;
use App\Models\Order_Argas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class DeliveryNoteExport implements FromCollection, WithEvents
{
    protected $order_id;
    protected $first_table_cell = 10;
    protected $last_table_cell = 0;

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

        $order = Order_Argas::findOrFail($this->order_id);

        $results = array();
        $total_qty = 0;

        $results[] = array("RAHDAN TRADING CENTER TOYOTA");
        $results[] = array("Old Sanaya, Mecca Street, 30th Cross Thuqbah.");
        $results[] = array("Tel / Fax  (03)  8940721 P.O.Box.190 AL KHOBAR");
        $results[] = array("");
        $results[] = array("Delivery Note No. : " . $order->pickslip_id);
        $results[] = array("Date. : " . Carbon::now()->format('d/m/Y'));
        $results[] = array("Customer : 2039 - ARABIAN GEOPHYSICAL & SURVEYING CO.شركة أركاس");
        $results[] = array("PO No. :");
        $results[] = array("");
        $results[] = array("SI#", "Part No.", "Description", "Qty");

        foreach ($items as $key => $item) {
            
            $results[] = array($key + 1, $item['partno'], $item['description'], $item['qty_ready']);

            $total_qty += $item['qty_ready'];
            $this->last_table_cell += 1;
        }

        $results[] = array("");
        $results[] = array("", "", "Total Qty :", $total_qty);
        $results[] = array("");
        $results[] = array("");
        $results[] = array("");
        $results[] = array("", "Received By");

        $this->last_table_cell += $this->first_table_cell;

        return collect($results);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                //$event->sheet->getDelegate()->setWidth('B', 500);
                /*
                $event->sheet->setWidth(array(
                    'A'     =>  5,
                    'B'     =>  10
                ));
                */
                $event->sheet->getColumnDimension('A')->setWidth(4);
                $event->sheet->getColumnDimension('B')->setWidth(20);
                $event->sheet->getColumnDimension('C')->setWidth(60);
                $event->sheet->getColumnDimension('D')->setWidth(5);

                // Rahdan
                $cell_company_name = 1;
                $event->sheet->getStyle('A'. $cell_company_name .':A'. $cell_company_name)->applyFromArray([
                    'font' => [
                        'size' =>  20   ,
                        'bold' => true
                    ]
                ]);

                // Table Header
                $cell_table_header = $this->first_table_cell;
                $event->sheet->getStyle('A'. $cell_table_header .':D'. $cell_table_header)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true
                    ]
                ]);

                // table border
                $event->sheet->getStyle('A'.$this->first_table_cell.':D'.$this->last_table_cell)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // style for label : Total Qty
                $cell_total_qty = $this->last_table_cell + 2;
                $event->sheet->getStyle('C'. $cell_total_qty .':C'. $cell_total_qty)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                ]);
                
                // style for label : Received By
                $cell_received_by = $this->last_table_cell + 6;
                $event->sheet->getStyle('B'. $cell_received_by .':B'. $cell_received_by)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
