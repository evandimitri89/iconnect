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
            ['name' => 'Basketball', 'description' => 'Team olahraga bola basket sekolah.', 'mentor' => 'Pak Andi'],
            ['name' => 'Paduan Suara', 'description' => 'Ekstrakurikuler vokal dan musik.', 'mentor' => 'Bu Sinta'],
            ['name' => 'Pramuka', 'description' => 'Kegiatan kepanduan dan kedisiplinan.', 'mentor' => 'Pak Joko'],
        ];

        foreach ($data as $item) {
            Extracurricular::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'mentor' => $item['mentor'],
            ]);
        }
    }
}
