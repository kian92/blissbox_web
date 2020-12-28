<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_id'
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
}
