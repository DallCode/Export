<?php

namespace App\Exports;

use App\Models\Kenaikan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KenaikanExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            Log::info('KenaikanExport view method called without filters.');

            $kenaikan = Kenaikan::with('siswa')->get();
            Log::info("Total siswa retrieved: " . $kenaikan->count());

            return view('exports.kenaikan', [
                'kenaikan' => $kenaikan
            ]);
        } catch (\Exception $e) {
            Log::error('Error in KenaikanExport: ' . $e->getMessage());
            throw $e;
        }
    }
}
