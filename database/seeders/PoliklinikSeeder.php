<?php

namespace Database\Seeders;

use App\Models\Poliklinik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = Poliklinik::create([
            'nama_poliklinik' => 'Poli anak',
            'gedung' => 'Lt 3'

        ]);
        $user->save();
    }
}
