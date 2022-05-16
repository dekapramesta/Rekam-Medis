<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_dokter' => 'Stephan de Vries', 'spesialis' => 'jantung', 'no_telp' => '0989898', 'alamat' => 'dagangan'],
            ['nama_dokter' => 'John doe', 'spesialis' => 'kepala', 'no_telp' => '08921626', 'alamat' => 'madiun'],
        ];
        foreach ($data as $dt) {
            $user = Dokter::create($dt);
            $user->save();
        }
    }
}
