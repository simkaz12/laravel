<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ponas',
            'last' => 'kebas',
            'email' => 'kebas@gmail.com',
            'personal' => 12312312312,
            'password' => Hash::make('123456789'),
        ]);

        foreach (range(1, 15) as $_) {
            DB::table('accounts')->insert([
                'iban' => createIBAN(),
                'balance' => rand(100, 9000),
                'type' => rand(0, 2) ? 'normal' : 'savings',
                'user_id' => 1
            ]);
        }
    }
}