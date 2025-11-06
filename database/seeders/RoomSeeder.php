<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['name' => 'Ruang A1', 'floor_id' => 1],
            ['name' => 'Ruang A2', 'floor_id' => 1],
            ['name' => 'Ruang B1', 'floor_id' => 2],
            ['name' => 'Ruang B2', 'floor_id' => 2],
            ['name' => 'Ruang C1', 'floor_id' => 3],
            ['name' => 'Ruang C2', 'floor_id' => 3],
            ['name' => 'Ruang D1', 'floor_id' => 4],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
