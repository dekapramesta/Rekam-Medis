<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;


class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = Obat::create([
            'nama_obat'          => 'Paramex',
            'harga' => '7000',
            'keterangan' => 'Obat Pusing Kepala'

        ]);
        $user->save();
    }
}
