<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'fian@mail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '123456'
        ]);

        // \App\Models\ProfileClinic::factory(10)->create();

        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Test User',
            'email' => 'fian@mail.com',
            'address' => 'Jl. TB Simatupang',
            'doctor_name' => 'Test User',
            'unique_code' => '123456',
            'phone' => '123456'
        ]);

        $this->call(DoctorSeeder::class);
    }
}
