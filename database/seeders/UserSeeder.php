<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'username' =>'test先生',
                'icon' => 'icons/fish.jpg',
            ],
            [
                'name' => '山田',
                'email' => 'test1@test.com',
                'password' => Hash::make('password'),
                'username' =>'やまちゃん',
                'icon' => null
            ],
            ]);

        }
}
