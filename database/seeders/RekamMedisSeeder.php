<?php

namespace Database\Seeders;

use App\Models\RekamMedis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekamMedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = RekamMedis::create([
            'id_dokter' => 1,
            'id_pasien' => 1,
            'id_poli' => 1,
            'keluhan'    => 'Panas',
            'diagnosa'       => 'migrain',
            'tindakan' => 'diperiksa',
            'resep_obat' => 'Paracetamol',
            'tgl_periksa' => '2022-05-17'

        ]);
        $user->save();
    }
}
