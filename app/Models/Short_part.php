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

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($short_part) { // before delete() method call this
             $short_part->items()->delete();
             // do the rest of the cleanup...
        });
    }
}
