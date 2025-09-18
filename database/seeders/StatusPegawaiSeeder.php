<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusPegawaiSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari jenis pegawai
        $pnsId = DB::table('jenis_pegawais')->where('jenis_pegawai', 'PNS')->value('id');
        $pppkId = DB::table('jenis_pegawais')->where('jenis_pegawai', 'PPPK')->value('id');
        $honorId = DB::table('jenis_pegawais')->where('jenis_pegawai', 'Honor')->value('id');
        $kontrakId = DB::table('jenis_pegawais')->where('jenis_pegawai', 'Kontrak')->value('id');

        $statusPegawais = [
            // Status untuk PNS
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $pnsId, 'status_pegawai' => 'PNS Tetap'],
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $pnsId, 'status_pegawai' => 'PNS Calon'],
            
            // Status untuk PPPK
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $pppkId, 'status_pegawai' => 'PPPK Tetap'],
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $pppkId, 'status_pegawai' => 'PPPK Kontrak'],
            
            // Status untuk Honor
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $honorId, 'status_pegawai' => 'Honor Daerah'],
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $honorId, 'status_pegawai' => 'Honor Sekolah'],
            
            // Status untuk Kontrak
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $kontrakId, 'status_pegawai' => 'Kontrak 1 Tahun'],
            ['id' => Str::uuid(), 'jenis_pegawai_id' => $kontrakId, 'status_pegawai' => 'Kontrak 2 Tahun'],
        ];

        DB::table('status_pegawais')->insert($statusPegawais);
    }
}