<?php

namespace App\Http\Controllers;

use App\Imports\KenaikanImport; // Import kelas yang kita buat untuk menghandle data import
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportKenaikanController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls' // Validasi file
        ]);

        Excel::import(new KenaikanImport, $request->file('file')); // Import file

        return redirect()->route('kenaikan.index')->with('success', 'Data kenaikan berhasil diimpor!');
    }
}
