<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Unitps;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        // $currentTime = Carbon::now()->toTimeString();
        // Pesanan::where('status', '!=', 'Selesai')
        // ->where('selesai', '<=', $currentTime)
        // ->update(['status' => 'Selesai']);

        $pesanan = Pesanan::get();
        return view('dashboard.admin.pesanan', compact('pesanan'));
    }

    public function tambah()
    {
        return view('dashboard.admin.tambahpesanan');
    }

    public function submit(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|char',
                'tipe' => 'required|char',
                'durasi' => 'required|char',
                'tgl' => 'required|date',
                // 'total' => 'required|integer',
                'status' => 'required|char',
            ],
            [
                'nama.required' => '*nama pelanggan harus diisi.',
                'tipe.required' => '*tipe ps harus diisi.',
                'durasi.required' => '*durasi sewa harus diisi.',
                'tgl.required' => '*tanggal harus diisi.',
                // 'total.required' => '* harus diisi.',
                'status.required' => '*status harus diisi.',
            ]
        );

        $pesanan = new Pesanan();
        $pesanan->nama = $request->nama;
        $pesanan->tipe = $request->tipe;
        $pesanan->durasi = $request->durasi;
        // $pesanan->mulai = $request->mulai;
        // $pesanan->selesai = $request->selesai;
        $pesanan->tgl = $request->tgl;
        $pesanan->total = $request->total;
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('pesanan');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        return view('dashboard.admin.editpesanan', compact('pesanan'));
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->nama = $request->nama;
        $pesanan->tipe = $request->tipe;
        $pesanan->durasi = $request->durasi;
        // $pesanan->mulai = $request->mulai;
        // $pesanan->selesai = $request->selesai;
        $pesanan->tgl = $request->tgl;
        $pesanan->total = $request->total;
        $pesanan->status = $request->status;
        $pesanan->update();

        return redirect()->route('pesanan');
    }

    public function delete($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect()->route('pesanan');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $pesanan = Pesanan::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pesanan = Pesanan::all();
        }

        return view('dashboard.admin.pesanan', ['pesanan' => $pesanan]);
    }

    public function konfirmasi($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'Dikonfirmasi';
        $pesanan->save();

        return redirect()->route('pesanan')->with('message', 'Pesanan berhasil dikonfirmasi.');

        if ($pesanan) {
            $pesanan->status = 'Dikonfirmasi';
            $pesanan->save();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dikonfirmasi.',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Pesanan tidak ditemukan.',
        ]);
    }

    public function cetak(Request $request)
    {
        // Ambil semua data dari tabel pesanan
        $pesanans = Pesanan::all();

        // Load view PDF
        $pdf = Pdf::loadView('dashboard.admin.cetakpesanan', compact('pesanans'));

        // Unduh atau tampilkan PDF
        return $pdf->download('pesanan.pdf');
    }

    public function user()
    {
        $pesanan = Pesanan::get();
        $units = Unitps::where('stok', '>', 0)->get();
        return view('dashboard.user.pesanan.pesanan', compact('pesanan', 'units'));
    }

    public function submitu(Request $request)
    {

        $unit = Unitps::where('nama', '=', $request->tipe)->get()->first();
        $unit_stok = $unit->stok;
        $unit_sekarang = $unit_stok - 1;


        if ($unit_sekarang <= -1) {
            return redirect()->back()->with('error', 'Stok Tidak Cukup');
        } else {
            $unit->update([
                'stok' => $unit_sekarang,
            ]);

            $pesanan = new Pesanan();
            $pesanan->nama = $request->nama;
            $pesanan->tipe = $request->tipe;
            $pesanan->tgl = $request->tgl;
            $pesanan->durasi = $request->durasi;
            $pesanan->total = $request->total;
            $pesanan->status = $request->status;
            $pesanan->save();

            return redirect()->route('upesanan');
        }
    }

    // public function selesai($id) {
    //     $pesanan = Pesanan::findOrFail($id);

    //     $pesanan->tgl_selesai = Carbon::now();
    //     $pesanan->status = 'Selesai';
    //     $pesanan->save();

    //     return response()->json([
    //         'message' => 'Pesanan berhasil diselesaikan',
    //         'tgl_selesai' => $pesanan->tgl_selesai->format('d-m-y/H:i:s')]);
    // }

}
