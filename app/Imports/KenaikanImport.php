<?php

namespace App\Imports;

use App\Models\Kenaikan;
use App\Models\Siswa;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Str;

class KenaikanImport implements ToModel, WithHeadings
{
    public function model(array $row)
    {
        $kelasAsal = Kelas::find($row[2]);
        $kelasTujuan = Kelas::find($row[3]);

        $tingkatAsal = (int) Str::take($kelasAsal->nama_kelas, 2);
        $tingkatTujuan = (int) Str::take($kelasTujuan->nama_kelas, 2);

        // dd($tingkatAsal, $tingkatTujuan);

        if ($tingkatAsal >= $tingkatTujuan) {
            $status = 'Tidak Naik';
        } else {
            $status = 'Naik';
        }

        return new Kenaikan([
            'id_siswa'     => $row[0],
            'tahun_ajaran' => $row[1],
            'kelas_asal'   => $row[2],
            'kelas_tujuan' => $row[3],
            'status'       => $status,
        ]);
    }

    public function headings(): array
    {
        return [
            'ID Siswa',
            'Tahun Ajaran',
            'Kelas Asal',
            'Kelas Tujuan',
        ];
    }
}
