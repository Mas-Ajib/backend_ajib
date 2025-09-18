<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AgamaSeeder extends Seeder
{
    public function run()
    {
        $agamas = [
            ['id' => Str::uuid(), 'agama' => 'Islam'],
            ['id' => Str::uuid(), 'agama' => 'Kristen Protestan'],
            ['id' => Str::uuid(), 'agama' => 'Kristen Katolik'],
            ['id' => Str::uuid(), 'agama' => 'Hindu'],
            ['id' => Str::uuid(), 'agama' => 'Buddha'],
            ['id' => Str::uuid(), 'agama' => 'Konghucu'],
            ['id' => Str::uuid(), 'agama' => 'Lainnya'],
        ];

        DB::table('agamas')->insert($agamas);
    }
}