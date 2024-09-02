<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_aplikasi',
        'tgl_pengajuan',
        'keterangan',
        
    ];
}
