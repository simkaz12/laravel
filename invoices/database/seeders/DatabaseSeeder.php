<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('invoices')->insert([
                'invoice_number' => 'FV-' . (1000 + $index),
                'invoice_date' => $faker->date(),
                'client_name' => $faker->company(),
                'client_address' => $faker->address(),
                'client_address2' => rand(0, 2) ? null : $faker->secondaryAddress(),
                'client_vat' => rand(0, 2) ? null : $faker->numberBetween(1000, 9999),
                'client_country' => $faker->countryCode(),
                'invoice_amount' => $faker->numberBetween(1000, 9999),
            ]);
        }

    }
}