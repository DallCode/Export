<?php

namespace App\Http\Controllers;

use App\Models\Kenaikan; // asumsi Anda memiliki model Kenaikan
use Illuminate\Http\Request;

class KenaikanController extends Controller
{
    public function index()
    {
        $kenaikan = Kenaikan::all(); // ambil semua data kenaikan
        return view('kenaikan.index', compact('kenaikan'));
    }

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
}
