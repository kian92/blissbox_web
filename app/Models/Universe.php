<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Universe extends Model
{
    use SoftDeletes;

	protected $fillable = [
        'initial', 'name', 'thumbnail', 'description'
    ];

    public function giftboxes() {
        return $this->hasMany('App\Models\Giftbox');
    }
    
}
