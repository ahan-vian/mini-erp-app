<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_project',
        'deskripsi_project',
        'tanggal_mulai',
        'tanggal_selesai',
        'manager_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
