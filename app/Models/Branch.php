<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $table = "branches";
    protected $fillable = [
        'company_id', 'name', 'location', 'address', 'contact', 'email'
   ];

   public function company() {
       return $this->belongsTo('App\Models\Company');
   }
}
