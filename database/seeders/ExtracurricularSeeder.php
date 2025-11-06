<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extracurricular;
use Illuminate\Support\Str;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Basketball',
                'teachers' => 'Pak Andi',
                'day' => 'Monday',
                'time' => '15:00 - 17:00',
                'room_id' => 1
            ],
            [
                'name' => 'Paduan Suara',
                'teachers' => 'Bu Sinta',
                'day' => 'Tuesday',
                'time' => '14:00 - 16:00',
                'room_id' => 2
            ],
            [
                'name' => 'Pramuka',
                'teachers' => 'Pak Joko',
                'day' => 'Friday',
                'time' => '13:00 - 17:00',
                'room_id' => 3
            ],
        ];

        foreach ($data as $item) {
            Extracurricular::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'teachers' => $item['teachers'],
                'day' => $item['day'],
                'time' => $item['time'],
                'room_id' => $item['room_id'],
            ]);
        }
    }
}
