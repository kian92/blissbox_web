<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    protected $fillable = [
        'user_id', 'billing_address', 'billing_city', 'billing_state', 'billing_postal'
    ];

    protected $table = 'billing_information';

    public function user() {
        $this->belongsTo('App/Models/User');
    }

}
