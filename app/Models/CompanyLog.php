<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLog extends Model
{
	protected $fillable = [
        'user_id', 'company_id', 'action', 'description'
    ];

    public function company() {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
