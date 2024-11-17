<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nis', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
}
