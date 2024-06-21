<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('owners')->insert([
            [
                'name' => 'owner1',
                'email' => 'owner@test.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'owner2',
                'email' => 'owner2@test.com',
                'password' => Hash::make('password'),
            ],
            ]);
    }
}
