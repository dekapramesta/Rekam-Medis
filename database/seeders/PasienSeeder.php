<?php

namespace Database\Seeders;

use App\Models\Pasien;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = Pasien::create([
            'no_rm' => 'RM002192',
            'nama_pasien'          => 'mamad',
            'gender'          => 'Pria',
            'no_telp'             => '0867237236',
            'alamat'       => 'asasasondj',
            'nik' => '1212918',
            'alamat' => 'nglanduk',
            'ttl' => 'madiun 12-november-2000',
            'pekerjaan' => 'mahasiswa',
            'pendidikan' => 'sma',
            'status' => 'Menikah',
            'agama' => 'islam'

        ]);
        $user->save();
    }
}
