<?php

namespace App\Models;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'floor_id'];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function extracurriculars()
    {
        return $this->hasMany(Extracurricular::class);
    }

    public function reservations()
    {
        return $this->hasMany(RoomReservation::class);
    }


}


