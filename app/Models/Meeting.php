<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'followed_by',
        'topic',
        'location',
        'date',
        'time',
        'note',
    ];
}

