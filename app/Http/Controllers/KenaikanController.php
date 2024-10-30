<?php

namespace App\Http\Controllers;

use App\Exports\KenaikanExport;
use App\Models\Kelas;
use App\Models\Kenaikan; // asumsi Anda memiliki model Kenaikan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class KenaikanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        $kelas_asal = $request->input('kelas_asal');
        $kelas_tujuan = $request->input('kelas_tujuan');
        $search = $request->input('search');

        $query = Kenaikan::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($kelas_asal) {
            $query->whereHas('kelas_Asal', function ($q) use ($kelas_asal) {
                $q->where('kelas_asal', $kelas_asal);
            });
        }

        if ($kelas_tujuan) {
            $query->whereHas('kelas_Tujuan', function ($q) use ($kelas_tujuan) {
                $q->where('kelas_tujuan', $kelas_tujuan);
            });
        }

        if ($search) {
            $query->whereHas('siswa', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            })
                ->orWhereHas('kelas_Asal', function ($q) use ($search) {
                    $q->where('nama_kelas', 'like', '%' . $search . '%');
                })
                ->orWhereHas('kelas_Tujuan', function ($q) use ($search) {
                    $q->where('nama_kelas', 'like', '%' . $search . '%');
                });
        }

        $kenaikan = $query->get();

        $kelas = Kelas::all();
        return view('kenaikan.index', compact('kenaikan', 'kelas'));
    }

    // public function index()
    // {
    //     $kenaikan = Kenaikan::all(); // ambil semua data kenaikan
    //     foreach ($kenaikan as $k) {
    //         $k['status'] = $k->kelas_asal == $k->kelas_tujuan ? 'Tidak Naik' : 'Naik';
    //     }
    //     return view('kenaikan.index', compact('kenaikan'));
    // }

    public function create()
    {
        $kenaikan = Kenaikan::all();
        return view('kenaikan.create', compact('kenaikan')); // Bukti form tambah kenaikan
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswas,id',
            'tahun_ajaran' => 'required|string|max:20',
            'kelas_asal' => 'required|exists:kelas,id',
            'kelas_tujuan' => 'required|exists:kelas,id',
            'status' => 'required|in:Naik, Tidak Naik',
        ]);

        Kenaikan::create($request->all());

        return redirect()->route('kenaikan.index')->with('success', 'Kenaikan berhasil ditambahkan');
    }


    public function edit(Kenaikan $kenaikan)
    {
        return view('kenaikan.edit', compact('kenaikan')); // Bukti form edit kenaikan
    }

    public function update(Request $request, Kenaikan $kenaikan)
    {

        $request->validate([
            'id_siswa' => 'required|exists:siswas,id',
            'tahun_ajaran' => 'required|string|max:20',
            'kelas_asal' => 'required|exists:kelas,id',
            'kelas_tujuan' => 'required|exists:kelas,id',
        ]);

        $kenaikan->update($request->all());
        return redirect()->route('kenaikan.index')->with('success', 'Kenaikan berhasil diperbarui');
    }

    public function destroy(Kenaikan $kenaikan)
    {
        $kenaikan->delete();
        return redirect()->route('kenaikan.index')->with('success', 'Kenaikan berhasil dihapus');
    }

    // Tambahkan di dalam class SiswaController
    public function export(Request $request)
    {
        Log::info('Export method called');

        return Excel::download(new KenaikanExport(), 'data_kenaikan.xlsx');
    }
}
