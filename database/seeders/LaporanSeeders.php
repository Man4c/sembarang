<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filter Hari
        // Pesanan::factory(7)->create([
        //     'created_at' => Carbon::today(),
        // ]);

        // Filter Kemarin
        Pesanan::factory(7)->create([
            'created_at' => Carbon::yesterday(),
        ]);

        // Filter Minggu
        Pesanan::factory(7)->create([
            'created_at' => Carbon::now()->startOfWeek(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
        });

        // Filter Bulanan
        Pesanan::factory(7)->create([
            'created_at' => Carbon::now()->startOfMonth(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
        });
    }
}
