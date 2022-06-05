<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PasienSeeder::class,
            ObatSeeder::class,
            PoliklinikSeeder::class,
            DokterSeeder::class,
            RekamMedisSeeder::class,
        ]);
    }
}
