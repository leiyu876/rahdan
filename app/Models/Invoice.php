<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function action() {

    	return $this->belongsTo('App\Models\Action', 'action_code', 'code');
    }

    public function user() {

    	return $this->belongsTo('App\User');
    }
}
