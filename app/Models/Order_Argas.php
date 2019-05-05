<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pickslip_Argas;

class Order_Argas extends Model
{
    public function items() {

    	return $this->hasMany('App\Models\Pickslip_Argas');
    }

    public function balance() {
        
        $balance = 0;

    	foreach (Pickslip_Argas::where('order_id', $this->id)->get() as $v) {
    		
    		$balance += ($v->qty - $v->qty_send);
    	}

    	return $balance;
    }

    public function qty_total() {
        
        $qty_total = 0;

        foreach (Pickslip_Argas::where('order_id', $this->id)->get() as $v) {
            
            $qty_total += $v->qty;
        }

        return $qty_total;
    }
}
