<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Short_part extends Model
{
    public function items() {

    	return $this->hasMany('App\Models\Short_part_detail');
    }

    public function supplier() {

    	return $this->belongsTo('App\Models\Supplier', 'supplier_id', 'id');
    }

    public function totalShortQuantities() {        

        $items = \App\Models\Short_part_detail::where('short_part_id', $this->id)->get();

        $total_request  = 0;
        $total_received = 0;

        foreach ($items as $key => $value) {
            
            $total_request  += $value->request;
            $total_received += $value->received;
        }

        return $total_request - $total_received;
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($short_part) { // before delete() method call this
             $short_part->items()->delete();
             // do the rest of the cleanup...
        });
    }
}
