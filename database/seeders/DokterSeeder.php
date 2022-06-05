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
            ['id' => 1, 'nama_dokter' => 'Stephan de Vries', 'id_user' => 3, 'id_poli' => '1', 'spesialis' => 'jantung', 'no_telp' => '0989898', 'alamat' => 'dagangan'],
            ['id' => 2, 'nama_dokter' => 'John doe', 'id_user' => 4, 'id_poli' => '1', 'spesialis' => 'kepala', 'no_telp' => '08921626', 'alamat' => 'madiun'],
        ];
        foreach ($data as $dt) {
            $user = Dokter::create($dt);
            $user->save();
        }
    }
}
