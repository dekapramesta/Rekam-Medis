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
        $user = User::create([
            'username'          => 'dekapra',
            'password'          => Hash::make('deka'),
            'level'             => 1,
            'status_user'       => 1
        ]);
        $user->save();
    }
}
