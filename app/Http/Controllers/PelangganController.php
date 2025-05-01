<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::get();
        return view('dashboard.admin.pelanggan', compact('pelanggan'));
    }

    public function tambah()
    {
        return view('dashboard.admin.tambahpelanggan');
    }

    public function submit(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string',
                'kontak' => 'required|string',
                'alamat' => 'required|string'
            ],
            [
                'nama.required' => '*nama pelanggan harus diisi.',
                'kontak.required' => '*kontak harus diisi.',
                'alamat.required' => '*alamat harus diisi',
            ]
        );

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->kontak = $request->kontak;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return redirect()->route('pelanggan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('dashboard.admin.editpelanggan', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama = $request->nama;
        $pelanggan->kontak = $request->kontak;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->update();

        return redirect()->route('pelanggan');
    }

    public function delete($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $pelanggan = Pelanggan::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $pelanggan = Pelanggan::all();
        }

        return view('dashboard.admin.pelanggan', ['pelanggan' => $pelanggan]);
    }

    public function cetak(Request $request)
    {
        $pelanggans = Pelanggan::all();
        $pdf = Pdf::loadView('dashboard.admin.cetakpelanggan', compact('pelanggans'));
        return $pdf->download('pelanggan.pdf');
    }

    public function user()
    {
        $pelanggan = Pelanggan::get();
        return view('dashboard.user.pelanggan.pelanggan');
    }
}
