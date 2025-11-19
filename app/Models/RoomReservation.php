<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'purpose',
        'reserved_date',
        'start_time',
        'end_time',
        'status',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
