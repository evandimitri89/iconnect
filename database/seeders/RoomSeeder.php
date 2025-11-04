<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['name' => 'Lab Komputer', 'floor_id' => 1],
            ['name' => 'Ruang Musik', 'floor_id' => 2],
            ['name' => 'Aula Serbaguna', 'floor_id' => 3],
        ]);
    }
}
