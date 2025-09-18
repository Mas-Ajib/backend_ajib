<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            JenisPegawaiSeeder::class,
            StatusPegawaiSeeder::class,
            AgamaSeeder::class,
            UnitSeeder::class,
            SubunitSeeder::class,
        ]);
    }
}