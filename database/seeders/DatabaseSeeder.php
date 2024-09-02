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
            'name' => 'Anwar',
            'email' => 'anwar@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '87123612',
        ]);
        // $table->string('name');
        // $table->string('address');
        // $table->string('phone');
        // $table->string('email');
        // $table->string('logo')->nullable();
        // $table->string('description')->nullable();
        // //nama dokter
        // $table->string('doctor_name');
        // //code unik
        // $table->string('unique_code');

        // $table->timestamps();

        \App\Models\profileclinic::factory()->create([
            'name' => 'klinik Anwar',
            'address' => 'Jalan Guru Zainal Cantik',
            'phone' => '80292828',
            'email' => 'klinikanwar@gmail.com',
            'doctor_name' => 'dr.anwarJIHAD',
            'unique_code' => '123456',
        ]);
        //call
        $this->call(DoctorSeeder::class);

    }
}
