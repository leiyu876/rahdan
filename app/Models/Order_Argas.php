<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Argas extends Model
{
    public function items() {

    	return $this->hasMany('App\Models\Pickslip_Argas');
    }
}
