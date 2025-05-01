<?php

namespace App\Http\Controllers;

use App\Models\Respon4;
use Illuminate\Http\Request;

class Respon4Controller extends Controller
{
    //
    public function tambah_nilai_tugas(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'jenis' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $bobot = [
            'hadir' => 25,
            'tugas' => 30,
            'r1' => 5,
            'r2' => 5,
            'r3' => 10,
            'r4' => 15,
            'r5' => 15,
        ];

        $data = new Respon4();
        $data->nim = $request->nim;

        $jenis = $request->jenis;
        $nilai = $request->nilai;

        if ($jenis === 'kehadiran') {
            $data->hadir = ($nilai * 100) / $bobot['hadir'];
        } elseif (str_starts_with($jenis, 't')) {
            $data->tugas = ($nilai / 6) * 0.3;
        } elseif (array_key_exists($jenis, $bobot)) {
            $data->projek = ($nilai * $bobot[$jenis]) / 100;
        }

        $totalNilai = $data->hadir + $data->tugas + ($data->projek ?? 0);
        $nilaiHuruf = $this->determineGrade($totalNilai);

        $data->total = $totalNilai;
        $data->huruf = $nilaiHuruf;
        $data->save();

        return redirect("/dashboard/admin/respon4")->with('success', 'Nilai berhasil ditambahkan.');
    }

    private function determineGrade($totalNilai)
    {
        if ($totalNilai >= 85) {
            return 'A';
        } elseif ($totalNilai >= 70) {
            return 'B';
        } elseif ($totalNilai >= 55) {
            return 'C';
        } elseif ($totalNilai >= 40) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
