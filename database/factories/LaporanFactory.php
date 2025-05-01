<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->namapelanggan(),
            'tipe' => fake()->tipeps(),
            'durasi' => fake()->durasisewa(),
            'tgl' => fake()->tanggal(),
            'total' => fake()->totaltarif(),
            'status' => fake()->statuspesanan(),
        ];
    }
}
