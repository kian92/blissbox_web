<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $fillable = [
        'email', 'company_name', 'name', 'position'
    ];
}
