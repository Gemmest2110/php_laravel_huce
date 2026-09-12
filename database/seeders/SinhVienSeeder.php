<?php

namespace Database\Seeders;

use App\Models\SinhVien;
use Illuminate\Database\Seeder;

class SinhVienSeeder extends Seeder
{
    public function run(): void
    {
        SinhVien::factory(15)->create();
    }
}
