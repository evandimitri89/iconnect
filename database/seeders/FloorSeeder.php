<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('floors')->insert([
            ['name' => 'Lantai 1'],
            ['name' => 'Lantai 2'],
            ['name' => 'Lantai 3'],
        ]);
    }
}
