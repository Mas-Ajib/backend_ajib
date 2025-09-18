<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JenisPegawaiSeeder extends Seeder
{
    public function run()
    {
        $jenisPegawais = [
            ['id' => Str::uuid(), 'jenis_pegawai' => 'PNS'],
            ['id' => Str::uuid(), 'jenis_pegawai' => 'PPPK'],
            ['id' => Str::uuid(), 'jenis_pegawai' => 'Honor'],
            ['id' => Str::uuid(), 'jenis_pegawai' => 'Kontrak'],
            ['id' => Str::uuid(), 'jenis_pegawai' => 'Magang'],
        ];

        DB::table('jenis_pegawais')->insert($jenisPegawais);
    }
}