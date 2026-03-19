<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'clock_in',
        'clock_out',
        'tanggal',
        'jam_kerja',
        'kehadiran',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'karyawan_id');
    }
}
