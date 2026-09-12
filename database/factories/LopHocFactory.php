<?php

namespace Database\Factories;

use App\Models\LopHoc;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<LopHoc> */
class LopHocFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tenlop' => strtoupper(fake()->bothify('??##')),
            'siso' => fake()->numberBetween(20, 50),
            'giaovien' => fake()->name(),
        ];
    }
}
