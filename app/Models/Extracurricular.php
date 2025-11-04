<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'mentor',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
