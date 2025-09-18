<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubunitSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari unit
        $sekretariatId = DB::table('units')->where('unit', 'Sekretariat')->value('id');
        $pendidikanId = DB::table('units')->where('unit', 'Bidang Pendidikan')->value('id');
        $kesehatanId = DB::table('units')->where('unit', 'Bidang Kesehatan')->value('id');
        $puId = DB::table('units')->where('unit', 'Bidang Pekerjaan Umum')->value('id');

        $subunits = [
            // Subunit untuk Sekretariat
            ['id' => Str::uuid(), 'unit_id' => $sekretariatId, 'subunit' => 'Bagian Umum'],
            ['id' => Str::uuid(), 'unit_id' => $sekretariatId, 'subunit' => 'Bagian Keuangan'],
            ['id' => Str::uuid(), 'unit_id' => $sekretariatId, 'subunit' => 'Bagian Kepegawaian'],
            
            // Subunit untuk Pendidikan
            ['id' => Str::uuid(), 'unit_id' => $pendidikanId, 'subunit' => 'Seksi TK/SD'],
            ['id' => Str::uuid(), 'unit_id' => $pendidikanId, 'subunit' => 'Seksi SMP'],
            ['id' => Str::uuid(), 'unit_id' => $pendidikanId, 'subunit' => 'Seksi Pendidikan Non Formal'],
            
            // Subunit untuk Kesehatan
            ['id' => Str::uuid(), 'unit_id' => $kesehatanId, 'subunit' => 'Seksi Kesehatan Masyarakat'],
            ['id' => Str::uuid(), 'unit_id' => $kesehatanId, 'subunit' => 'Seksi Pelayanan Kesehatan'],
            
            // Subunit untuk Pekerjaan Umum
            ['id' => Str::uuid(), 'unit_id' => $puId, 'subunit' => 'Seksi Jalan dan Jembatan'],
            ['id' => Str::uuid(), 'unit_id' => $puId, 'subunit' => 'Seksi Air Bersih'],
        ];

        DB::table('subunits')->insert($subunits);
    }
}