<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostFoundItem extends Model
{
    protected $fillable = [
        'item_name',
        'description',
        'status',
        'reported_by',
        'claimed_by',
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function claimer()
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }
}


