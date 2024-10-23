<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'pelapor',
        'terlapor',
        'kelas',
        'laporan',
        'bukti',
        'status',
    ];

    use HasFactory;
}
