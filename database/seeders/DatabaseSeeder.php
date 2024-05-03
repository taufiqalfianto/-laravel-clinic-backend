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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'fian@mail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '123456'
        ]);

        //seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Bahri',
            'address' => 'Jl. Raya Ciputat Parung No. 1',
            'phone' => '1234567890',
            'email' => 'dr.bahri@klinik.com',
            'doctor_name' => 'Dr. Bahri',
            'unique_code' => '123456',
        ]);

        //call
        $this->call([
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            PatientSeeder::class,
            ServiceMedicinesSeeder::class,
            PatientScheduleSeeder::class,
        ]);
    }
}
