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
     */
    public function run(): void
    {

        User::insert([
            [
            'name' => 'Supper admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('12345678'),
            'user_type' => 'admin',
            ],
            [
            'name' => 'Ashkan rabiee',
            'email' => 'user@gmail.com',
            'password' =>  Hash::make('12345678'),
            'user_type' => 'user',
            ],

        ]);
    }
}
