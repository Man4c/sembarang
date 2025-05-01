<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unitps>
 */
class UnitpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => 'Unit 1',
            'kontroller' => 2,
            'tarif' => 20000,
            'penyimpanan' => '500GB',
            'stok' => 10,
            'rincian' => fake()->sentence(),
        ];
    }
}
