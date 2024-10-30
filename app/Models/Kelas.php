<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas', 'jurusan'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
    public function kenaikan_Asal()
    {
        return $this->hasMany(Kenaikan::class, 'kelas_asal');
    }
    public function kenaikan_Tujuan()
    {
        return $this->hasMany(Kenaikan::class, 'kelas_tujuan');
    }
}
