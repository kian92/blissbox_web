<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giftbox extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'initial', 'universe_id', 'thumbnail', 'name', 'price', 'description', 'pdf_url', 'review'
    ];

    public function universe() {
        return $this->belongsTo('App\Models\Universe');
    }

    public function vouchers() {
        return $this->hasMany('App\Models\Voucher');
    }

    public function carts() {
        return $this->belongsToMany('App\Models\User', 'carts')->withPivot('recipients', 'to', 'message', 'package', 'status')->withTimestamps();
    }

    public function experiences() {
        return $this->belongsToMany('App\Models\Experience', 'giftbox_experience')->withPivot('giftbox_id')->withTimestamps();
    }

    public function wishlists() {
        return $this->belongsToMany('App\Models\User', 'wishlists')->withTimestamps();
    }

    public function reviews() {
        return $this->belongsToMany('App\Models\User', 'reviews')->withPivot('rate')->withTimestamps();
    }

    public function scopeUniverse($query) {
        return $query->where('name', $query->name);
    }
}
