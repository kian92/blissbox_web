<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'company_id', 'bank', 'branch', 'account_no', 'swift_code', 'paypal', 'other'
    ];

    public function companies() {
    	return $this->belongsTo('App\Models\Company');
    }
}
