<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query
        $query = Pesanan::select(
            'id',
            'nama',
            'tipe',
            'durasi',
            'tgl',
            'total',
            'status'
        );

        // Ambil filter dari request
        $date = $request->filter;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Terapkan filter berdasarkan opsi
        switch ($date) {
            case 'Hari ini':
                $query->whereDate('tgl', Carbon::today());
                break;
            case 'Kemarin':
                $query->whereDate('tgl', Carbon::yesterday());
                break;
            case 'Minggu ini':
                $query->whereBetween('tgl', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'Bulan ini':
                $query->whereMonth('tgl', Carbon::now()->month);
                break;
            case 'Tahun ini':
                $query->whereYear('tgl', Carbon::now()->year);
                break;
            default:
                // Tidak ada filter, ambil semua data
                break;
        }

        if ($startDate && $endDate) {
            $query->whereBetween('tgl', [$startDate, $endDate]);
        }

        // Eksekusi query dan ambil data
        $riwayatPesanan = $query->orderBy('id', 'asc')->get();

        // Kembalikan data ke tampilan
        return view('dashboard.pimpinan.laporan', compact('riwayatPesanan'));
    }

    public function cetak(Request $request) {
        $query = Pesanan::query();

        // Terapkan filter seperti pada fungsi index
        $date = $request->filter;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        switch ($date) {
            case 'Hari ini':
                $query->whereDate('tgl', Carbon::today());
                break;
            case 'Kemarin':
                $query->whereDate('tgl', Carbon::yesterday());
                break;
            case 'Minggu ini':
                $query->whereBetween('tgl', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'Bulan ini':
                $query->whereMonth('tgl', Carbon::now()->month);
                break;
            case 'Tahun ini':
                $query->whereYear('tgl', Carbon::now()->year);
                break;
            default:
                break;
        }

        if ($startDate && $endDate) {
            $query->whereBetween('tgl', [$startDate, $endDate]);
        }

        $riwayatPesanan = $query->orderBy('id', 'asc')->get();

        // Generate PDF
        $pdf = PDF::loadView('dashboard.pimpinan.cetaklaporan', compact('riwayatPesanan', 'date'));

        // Download PDF
        return $pdf->download('laporan.pdf');
        }
}
