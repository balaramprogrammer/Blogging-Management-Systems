<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
     protected $fillable = [
    'slug',
    'name',
    'published_at',
    'updated_at'
    ];
}
