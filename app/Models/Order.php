<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'stripe_id', 'coupon_id', 'voucher_list', 'items', 'pay_by', 'total', 'billing_address', 'billing_city', 'billing_state', 'billing_postal', 'purchased_at', 'status'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function vouchers() {
        return $this->belongsTo('App\Models\Voucher');
    }

    public function coupon() {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function send_to() {
        return $this->belongsToMany('\App\Models\User', 'send_to_emails')->withPivot('id', 'giftbox_id', 'voucher_id', 'recipient', 'to', 'message')->withTimestamps();
    }

    public function deliver_to() {
        return $this->belongsToMany('App\Models\User', 'send_to_addresses')->withPivot('id', 'giftbox_id', 'tracking_code', 'to', 'message', 'status')->withTimestamps();
    }

    public function shipping() {
        return $this->hasOne('App\Models\Shipping');
    }

    public function invoice() {
        return $this->hasOne('App\Models\Invoice');
    }
}
