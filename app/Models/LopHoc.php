<?php

namespace App\Models;

use Database\Factories\LopHocFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    /** @use HasFactory<LopHocFactory> */
    use HasFactory;

    protected $fillable = [
        'tenlop',
        'siso',
        'giaovien',
    ];
}
