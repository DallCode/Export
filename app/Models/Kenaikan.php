<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenaikan extends Model
{
    use HasFactory;

    protected $fillable = ['id_siswa', 'tahun_ajaran', 'kelas_asal', 'kelas_tujuan', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function  kelas_Asal()
    {
        return $this->belongsTo(Kelas::class, 'kelas_asal');
    }
    public function   kelas_Tujuan()
    {
        return $this->belongsTo(Kelas::class, 'kelas_tujuan');
    }
}
