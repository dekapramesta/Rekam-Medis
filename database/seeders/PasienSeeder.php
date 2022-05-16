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
            'nama_pasien'          => 'mamad',
            'gender'          => 'Pria',
            'no_telp'             => '0867237236',
            'alamat'       => 'asasasondj',
            'email' => 'mamad@gmail.com',
            'alamat' => 'nglanduk'

        ]);
        $user->save();
    }
}
