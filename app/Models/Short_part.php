<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Short_part extends Model
{
    public function items() {

    	return $this->hasMany('App\Models\Short_part_detail');
    }
}
