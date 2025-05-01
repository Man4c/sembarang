<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Unitps;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalPelanggan = Pelanggan::count();
        $totalPesanan = Pesanan::count();
        $totalUnit = Unitps::count();

        // Filter untuk hanya menampilkan pesanan yang sudah dikonfirmasi
        $riwayatPesanan = Pesanan::where('status', 'Dikonfirmasi')
            ->select(
                'id',
                'nama',
                'tipe',
                'durasi',
                'tgl',
                'total',
                'status'
            )
            ->orderBy('id', 'asc')
            ->get();

        return view('dashboard.admin.dashboard', compact(
            'totalPelanggan',
            'totalPesanan',
            'totalUnit',
            'riwayatPesanan'
        ));
    }

    public function user() {
        $pesanan = Pesanan::get();
        return view('dashboard.user.dashboard.dashboard');
    }

    public function userd() {
        $totalPelanggan = Pelanggan::count();
        $totalPesanan = Pesanan::count();
        $totalUnit = Unitps::count();

        $riwayatPesanan = Pesanan::where('status', 'Dikonfirmasi')
            ->select(
                'id',
                'nama',
                'tipe',
                'durasi',
                // 'mulai',
                // 'selesai',
                'tgl',
                'total',
                'status'
        )
        ->orderBy('id','asc')
        ->get();

        return view('dashboard.user.dashboard.dashboard', compact(
            'totalPelanggan',
            'totalPesanan',
            'totalUnit',
            'riwayatPesanan'
        ));

        return view('dashboard.admin.user.dashboard.dashboard', compact('totalPelanggan','totalPesanan','totalUnit','riwayatPesanan'));
    }
}
