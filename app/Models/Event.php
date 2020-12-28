<?php

namespace App\Models;

use app\Helpers\DDD;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'name', 'email', 'code'
    ];
}
