<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Unitps;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'no_telp' => '08123456789',
            'alamat' => fake()->address(),
            'password' => 'admin',
            'otp' => '123456',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'no_telp' => '08123456789',
            'alamat' => fake()->address(),
            'password' => 'user12345678',
            'otp' => '123456',
            'role' => 'pelanggan',
        ]);

        User::factory()->create([
            'name' => 'pimpinan',
            'email' => 'pimpinan@gmail.com',
            'email_verified_at' => now(),
            'no_telp' => '08123456789',
            'alamat' => fake()->address(),
            'password' => 'pimpinan',
            'otp' => '123456',
            'role' => 'pimpinan',
        ]);

        // Unitps::factory()->create([
        //     'nama' => 'Unit 1',
        //     'kontroller' => 2,
        //     'tarif' => 20000,
        //     'penyimpanan' => '500GB',
        //     'stok' => 10,
        //     'rincian' => fake()->sentence(),
        // ]);
    }
}
