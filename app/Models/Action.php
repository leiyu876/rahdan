<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function invoices() {

    	return $this->hasMany('App\Models\Invoice');
    }
}
