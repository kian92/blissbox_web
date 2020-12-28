<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'giftbox_id', 'user_id', 'experience_id', 'code', 'pin', 'status', 'file_name', 'ownership_link', 'ownership_status', 'booking_date', 'booking_time', 'activation_at', 'expiration_at', 'redeemed_at', ];

    public function giftbox() {
        return $this->belongsTo('App\Models\Giftbox');
    }

    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    public function experience() {
        return $this->belongsTo('App\Models\Experience');
    }

}
