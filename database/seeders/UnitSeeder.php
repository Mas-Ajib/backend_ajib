<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['id' => Str::uuid(), 'unit' => 'Sekretariat'],
            ['id' => Str::uuid(), 'unit' => 'Bidang Pendidikan'],
            ['id' => Str::uuid(), 'unit' => 'Bidang Kesehatan'],
            ['id' => Str::uuid(), 'unit' => 'Bidang Pekerjaan Umum'],
            ['id' => Str::uuid(), 'unit' => 'Bidang Sosial'],
            ['id' => Str::uuid(), 'unit' => 'Bidang Ekonomi'],
        ];

        DB::table('units')->insert($units);
    }
}