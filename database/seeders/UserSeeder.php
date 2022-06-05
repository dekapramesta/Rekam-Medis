<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username'          => 'dekapra',
                'password'          => Hash::make('deka'),
                'level'             => 1,
                'status_user'       => 1
            ], [
                'username'          => 'admin',
                'password'          => Hash::make('admin'),
                'level'             => 2,
                'status_user'       => 1
            ],
            [
                'username'          => 'akaza',
                'password'          => Hash::make('akaza'),
                'level'             => 3,
                'status_user'       => 1
            ],
            [
                'username'          => 'patrick',
                'password'          => Hash::make('patrick'),
                'level'             => 3,
                'status_user'       => 1
            ],
        ];
        foreach ($data as $dt) {
            $user = User::create($dt);
            $user->save();
        }
    }
}
