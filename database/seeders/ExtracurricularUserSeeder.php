<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Extracurricular;

class ExtracurricularUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $extracurriculars = Extracurricular::all();

        if ($users->count() == 0 || $extracurriculars->count() == 0) {
            return;
        }

        foreach ($users as $user) {

            // ambil 1-3 ekskul random
            $randomEkskul = $extracurriculars->random(rand(1, 3));

            foreach ($randomEkskul as $ekskul) {
                $user->extracurriculars()->syncWithoutDetaching([
                    $ekskul->id => [
                        'status' => collect(['pending', 'approved', 'rejected'])->random(),
                    ]
                ]);
            }
        }
    }
}
