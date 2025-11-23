<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['name' => 'X TKJ 1', 'floor_id' => 2],
            ['name' => 'X TKJ 2', 'floor_id' => 4],
            ['name' => 'X AKL', 'floor_id' => 4],
            ['name' => 'X BID', 'floor_id' => 2],
            ['name' => 'XI TKJ 1', 'floor_id' => 4],
            ['name' => 'XI TKJ 2', 'floor_id' => 3],
            ['name' => 'XI TKJ 3', 'floor_id' => 2],
            ['name' => 'XI AKL', 'floor_id' => 2],
            ['name' => 'XI BID', 'floor_id' => 2],
            ['name' => 'XII TKJ 1', 'floor_id' => 3],
            ['name' => 'XII TKJ 2', 'floor_id' => 3],
            ['name' => 'XII TKJ 3', 'floor_id' => 2],
            ['name' => 'XII AKL 1', 'floor_id' => 4],
            ['name' => 'XII AKL 2', 'floor_id' => 3],
            ['name' => 'XII BID', 'floor_id' => 4],
            ['name' => 'Studio', 'floor_id' => 3],
            ['name' => 'Co-Working', 'floor_id' => 1],
            ['name' => 'Perpustakaan', 'floor_id' => 2],
            ['name' => 'Bengkel', 'floor_id' => 5],
            ['name' => 'Aula', 'floor_id' => 5],
            ['name' => 'Ruang Guru', 'floor_id' => 1],
            ['name' => 'Gudang OSIS', 'floor_id' => 2],
            ['name' => 'Vcon', 'floor_id' => 3],
            ['name' => 'Lobby', 'floor_id' => 1],
            ['name' => 'Lab Komputer', 'floor_id' => 1],
            ['name' => 'Lab Komputer 2', 'floor_id' => 2],
            ['name' => 'Lab Komputer 3', 'floor_id' => 3],
            ['name' => 'Lapangan Voli', 'floor_id' => 6],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
