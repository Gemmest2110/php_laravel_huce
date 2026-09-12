<?php

namespace App\Models;

use Database\Factories\SinhVienFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    /** @use HasFactory<SinhVienFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'email',
    ];
}
