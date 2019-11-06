<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function short_parts() {

    	return $this->hasMany('App\Models\Short_part');
    }
}
