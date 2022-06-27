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

            ObatSeeder::class,
            PoliklinikSeeder::class,
            DokterSeeder::class,
            PasienSeeder::class,
            RekamMedisSeeder::class,
        ]);
    }
}
