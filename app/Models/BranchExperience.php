<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchExperience extends Model
{
    public $table = "branch_experience";

    protected $fillable = [
       'voucher_id', 'branch_id', 'experience_id'
    ];

    public function vouchers() {
        return $this->hasMany('App\Models\Voucher');
    }
    
    public function branches() {
        return $this->hasMany('App\Models\Branch');
    }

    public function experiences() {
        return $this->hasMany('App\Models\Experience');
    }
}
