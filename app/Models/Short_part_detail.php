<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Short_part_detail extends Model
{
    public function order() {

    	return $this->belongsTo('App\Models\Short_part', 'short_part_id', 'id');
    }
}
