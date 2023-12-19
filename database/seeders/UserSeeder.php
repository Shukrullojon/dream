<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'name' => 'Shukrullo',
                'email' => 'shukrullobk@gmail.com',
                'phone' => '993011797',
                'password' => Hash::make('1272256a'),
                'token' => Str::uuid(),
                'status' => 1,
                'theme' => 'default',
            ],
            [
                'name' => 'Shukrullo 2',
                'email' => 'shukrullobk2@gmail.com',
                'phone' => '993011798',
                'password' => Hash::make('1272256a'),
                'token' => Str::uuid(),
                'status' => 1,
                'theme' => 'default',
            ],
            [
                'name' => 'Shukrullo3',
                'email' => 'shukrullobk3@gmail.com',
                'phone' => '993011799',
                'password' => Hash::make('1272256a'),
                'token' => Str::uuid(),
                'status' => 1,
                'theme' => 'default',
            ],
        ];

        foreach ($data as $d){
            User::create($d);
        }
    }
}
