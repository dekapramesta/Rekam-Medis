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
        $data = [
            ['nama_poliklinik' => 'Poli Umum', 'gedung' => 'Lt 1'],
            ['nama_poliklinik' => 'Poli Gigi', 'gedung' => 'Lt 1']
        ];
        foreach ($data as $dt) {
            $user = Poliklinik::create($dt);
            $user->save();
        }
    }
}
