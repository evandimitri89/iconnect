<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomReservation;
use App\Models\User;
use App\Models\Room;

class RoomReservationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $room = Room::first();

        if (!$user || !$room)
            return;

        RoomReservation::create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'reserved_date' => now()->format('Y-m-d'),
            'start_time' => '08:00',
            'end_time' => '10:00',
            'status' => 'approved',
            'purpose' => 'Study Group',
        ]);
    }
}
