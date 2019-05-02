<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickslip_Argas extends Model
{
    public function order() {

    	return $this->belongsTo('App\Models\Order_Argas', 'order_id', 'id');
    }
}