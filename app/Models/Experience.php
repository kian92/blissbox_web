<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Experience extends Model
{
    use Searchable, SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = [
    	'giftbox_id', 'company_id', 'thumbnail', 'name', 'code', 'pax', 'duration', 'address', 'requirements', 'services', 'information', 'email', 'phone'
    ];

    public function searchableAs()
    {
        return config('scout.prefix').'experiences';
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function giftboxes() {
    	return $this->belongsToMany('App\Models\Giftbox', 'giftbox_experience')->withPivot('giftbox_id')->withTimestamps();
    }

    public function voucher() {
        return $this->hasMany('App\Models\Voucher');
    }
}
