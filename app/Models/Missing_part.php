<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missing_part extends Model
{
    protected $guarded = [];

    public function setPartnoAttribute($value)
    {
    	$this->attributes['partno'] = strtoupper($value);
    }
}
