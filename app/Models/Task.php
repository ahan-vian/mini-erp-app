<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_task',
        'level',
        'status',
        'karyawan_id',
        'project_id',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'karyawan_id');
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
