<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id', 'user_id', 'giftbox_id', 'package', 'to', 'recipients', 'message', 'status'
    ];

    public function giftboxes() {
        return $this->hasMany('App\Models\Giftbox');
    }
}
