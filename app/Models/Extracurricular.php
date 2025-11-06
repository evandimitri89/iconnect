<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teachers',
        'slug',
        'room_id',
        'day',
        'time',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getPlaceAttribute()
    {
        if (!$this->room)
            return '-';
        return $this->room->name . ' (' . $this->room->floor->name . ')';
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status')
            ->withTimestamps();
    }

}
