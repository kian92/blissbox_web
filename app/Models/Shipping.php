<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'order_id', 'first_name', 'last_name', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_postal'
    ];

    public function billing() {
        return $this->belongsTo('App\Models\Order');
    }
}
