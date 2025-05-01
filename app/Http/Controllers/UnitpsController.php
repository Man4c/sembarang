<?php

namespace App\Http\Controllers;

use App\Models\Unitps;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UnitpsController extends Controller
{
    public function index()
    {
        $unit = Unitps::get();
        return view('dashboard.admin.unitps', compact('unit'));
    }

    public function tambah()
    {
        return view('dashboard.admin.tambahunit');
    }

    public function submit(Request $request)
    {
        $request->validate(
            [
                'gambar' => 'required|string',
                'nama' => 'required|string',
                'kontroller' => 'required|char',
                'tarif' => 'required|integer',
                'stok' => 'required|integer',
                'penyimpanan' => 'required|char',
                'rincian' => 'required|string',
            ],
            [
                'gambar.required' => '*nama pelanggan harus diisi.',
                'nama.required' => '*nama pelanggan harus diisi.',
                'kontroller.required' => '*kontroller harus diisi.',
                'tarif.required' => '*tarif harus diisi.',
                'stok.required' => '*stok harus diisi.',
                'penyimpanan.required' => '*penyimpanan harus diisi.',
                'rincian.required' => '*rincian harus diisi.',
            ]
        );

        $unit = new Unitps();
        $unit->gambar = $request->gambar;
        $unit->nama = $request->nama;
        $unit->kontroller = $request->kontroller;
        $unit->tarif = $request->tarif;
        $unit->stok = $request->stok;
        $unit->penyimpanan = $request->penyimpanan;
        $unit->rincian = $request->rincian;

        // // dd()

        if ($unit->gambar && file_exists(public_path($unit->gambar))) {
            // Hapus foto lama
            unlink(public_path($unit->gambar));
        }

        if (!@$request->hasFile('gambar')) {
            $unit->gambar = null;
        }

        // if (!$request->gambar) {
        //     $unit->gambar = null;
        //     // echo "tidak ada gambar";
        // }


        // // Simpan foto baru jika ada
        if ($request->hasFile('gambar')) {

            // echo "ada gambar";
            $nm = $request->file('gambar');

            // dd($nm);
            $nama_file = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
            $nama_file = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

            // Simpan file gambar di folder public/images
            $nm->move(public_path('images'), $nama_file);


            // Simpan path gambar di database
            $unit->gambar = 'images/' . $nama_file;
        }

        $unit->save();

        return redirect()->route('unitps');
    }

    public function edit($id)
    {
        $unit = Unitps::find($id);
        return view('dashboard.admin.editunit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unitps::find($id);
        $unit->nama = $request->nama;
        $unit->kontroller = $request->kontroller;
        $unit->tarif = $request->tarif;
        $unit->stok = $request->stok;
        $unit->penyimpanan = $request->penyimpanan;
        $unit->rincian = $request->rincian;

        if ($request->hasFile('gambar')) {
            if ($unit->gambar && file_exists(public_path($unit->gambar))) {
                unlink(public_path($unit->gambar));
            }
            $nm = $request->file('gambar');
            $nama_file = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
            $nm->move(public_path('images'), $nama_file);
            $unit->gambar = 'images/' . $nama_file;
        }

        $unit->save();

        return redirect()->route('unitps');
    }

    public function delete($id)
    {
        $unit = Unitps::find($id);
        $unit->delete();
        return redirect()->route('unitps');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $unit = Unitps::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $unit = Unitps::all();
        }

        return view('dashboard.admin.unitps', ['unit' => $unit]);
    }

    public function cetak(Request $request)
    {
        $units = Unitps::all();
        $pdf = Pdf::loadView('dashboard.admin.cetakunit', compact('units'));
        return $pdf->download('unit.pdf');
    }

    public function user()
    {
        $unit = Unitps::all();
        return view('dashboard.user.unitps.unitps', compact('unit'));
    }
}
