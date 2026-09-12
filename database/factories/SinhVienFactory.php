<?php

namespace Database\Factories;

use App\Models\SinhVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<SinhVien> */
class SinhVienFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(18, 25),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
