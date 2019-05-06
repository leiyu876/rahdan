<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order_Argas;

class Pickslip_Argas extends Model
{
    public function order() {

    	return $this->belongsTo('App\Models\Order_Argas', 'order_id', 'id');
    }

    public function balance() {
    	
    	return $this->qty - $this->qty_send;
	}

	public function pickslip_number() {
    	
		$order = Order_Argas::find($this->order_id);

		return $order->pickslip_id;
	}
}