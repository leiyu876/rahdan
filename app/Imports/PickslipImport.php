<?php

namespace App\Imports;

use App\Pickslip_Argas;
use Maatwebsite\Excel\Concerns\ToModel;

class PickslipImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pickslip_Argas([
            //
        ]);
    }
}
