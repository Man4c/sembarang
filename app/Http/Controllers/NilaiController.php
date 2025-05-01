<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respon4;

class NilaiController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'nim' => 'required|string|max:10',
            'jenis' => 'required|string',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        // Simpan ke Database
        Respon4::create([
            'nim' => $request->nim,
            'jenis' => $request->jenis,
            'nilai' => $request->nilai,
        ]);

        // Redirect dengan Pesan Sukses
        return redirect()->back()->with('success', 'Nilai berhasil disimpan!');
    }
}
