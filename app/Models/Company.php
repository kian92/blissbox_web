<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Company extends Model
{

    use Searchable;

    protected $fillable = [
        'name', 'registration_no', 'nature_of_business', 'country', 'registered_address', 'website', 'postal_code', 'business_type', 'business_hours'
    ];

    public function searchableAs()
    {
        return config('scout.prefix').'companies';
    }

    public function users() {
    	return $this->hasMany('App\Models\User');
    }

    public function payment() {
        return $this->hasOne('App\Models\Payment');
    }

    public function branches() {
        return $this->hasMany('App\Models\Branch');
    }

    public function experiences() {
        return $this->hasMany('App\Models\Experience', 'company_id', 'id');
    }

    public function logs() {
        return $this->hasMany('App\Models\CompanyLogs', 'company_id', 'id');
    }

}
