<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Floor;

class FloorSeeder extends Seeder
{
    public function run(): void
    {
        $floors = [
            ['name' => 'Lantai 1'],
            ['name' => 'Lantai 2'],
            ['name' => 'Lantai 3'],
            ['name' => 'Lantai 4'],
            ['name' => 'Lantai 5'],
            ['name' => 'Lapangan'],
        ];

        foreach ($floors as $floor) {
            Floor::create($floor);
        }
    }
}
