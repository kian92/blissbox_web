<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'role_id', 'company_id', 'title', 'first_name', 'last_name', 'email', 'designation', 'country', 'phone', 'postal_code', 'role', 'password', 'activation_code', 'activation_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function vouchers() {
        return $this->hasMany('App\Models\Voucher');
    }

    public function carts() {
        return $this->belongsToMany('App\Models\Giftbox', 'carts')->withPivot('recipients', 'to', 'message', 'package', 'status')->withTimestamps();
    }

    public function orders() {
        return $this->hasOne('App\Models\Order');
    }

    public function coupons() {
        return $this->belongsToMany('App\Models\Coupon', 'coupon_user')->withTimestamps();
    }

    public function billingInformation() {
        return $this->hasOne('App\Models\BillingInformation');
    }

    public function wishlists() {
        return $this->belongsToMany('App\Models\Giftbox', 'wishlists')->withTimestamps();
    }

    public function reviews() {
        return $this->belongsToMany('App\Models\Giftbox', 'reviews')->withPivot('rate')->withTimestamps();
    }

    public function send_to() {
        return $this->belongsToMany('App\Models\Order', 'send_to_emails')->withPivot('id', 'giftbox_id', 'voucher_id', 'recipient', 'message')->withTimestamps();
    }

    public function deliver_to() {
        return $this->belongsToMany('App\Models\Order', 'send_to_addresses')->withPivot('id', 'giftbox_id', 'tracking_code', 'message', 'status')->withTimestamps();
    }

    public function logs() {
        return $this->hasMany('App\Models\CompanyLogs', 'company_id', 'id');
    }

//    public function scopeGiftbox($query) {
//        return $query->where('name', $query->name);
//    }

}
