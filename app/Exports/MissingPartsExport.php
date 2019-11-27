<?php

namespace App\Exports;

use App\Models\Missing_part;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MissingPartsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$items = Missing_part::orderBy('created_at', 'desc')->get();

    	$results = array();

    	foreach ($items as $key => $item) {

    		$results[] = array($key + 1, $item->partno, $item->qty);
    	}

        return collect($results);
    }

    public function headings(): array
    {
        return [
        	[' ', 'Missing Parts'],
            ['#', 'Part Number', 'Qty',]
        ];
    }
}
