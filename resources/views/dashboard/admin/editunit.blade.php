@extends('layouts.tambahunit')

@section('tambahunit_content')

{{-- @dd($unit->gambar) --}}

<div class="container">
    <div class="form-header">
        <h1>Form Edit Unit</h1>
        <p>Silakan isi data dengan lengkap dan benar</p>
    </div>

    <form action="{{ route('unit.update', $unit->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Gambar PS</label>
            @if($unit->gambar)
                <img src="{{ asset($unit->gambar) }}" alt="Gambar PS" width="100">
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <div class="form-group">
            <label for="nama">Tipe Playstation</label>
            <select class="form-control" id="nama" name="nama">
                <option value="">Pilih Tipe PS</option>
                <option value="Play Station 1" data-harga="30000" {{ $unit->nama == 'Play Station 1' ? 'selected' : '' }}>Play Station 1 - Rp 30.000</option>
                <option value="Play Station 2" data-harga="40000" {{ $unit->nama == 'Play Station 2' ? 'selected' : '' }}>Play Station 2 - Rp 40.000</option>
                <option value="Play Station 3" data-harga="70000" {{ $unit->nama == 'Play Station 3' ? 'selected' : '' }}>Play Station 3 - Rp 70.000</option>
                <option value="Play Station 4" data-harga="90000" {{ $unit->nama == 'Play Station 4' ? 'selected' : '' }}>Play Station 4 - Rp 90.000</option>
                <option value="Play Station 5" data-harga="100000" {{ $unit->nama == 'Play Station 5' ? 'selected' : '' }}>Play Station 5 - Rp 100.000</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kontroller">Kontroller</label>
            <input type="number" class="form-control" id="kontroller" name="kontroller" value="{{ $unit->kontroller }}" placeholder="Masukkan jumlah kontroller">
        </div>

        <div class="form-group">
            <label for="tarif">Tarif /Hari</label>
            <input type="number" class="form-control" id="tarif" name="tarif" value="{{ $unit->tarif }}" placeholder="Masukkan jumlah tarif">
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok"  value="{{ $unit->stok }}" placeholder="Masukkan jumlah tarif">
        </div>

        <div class="form-group">
            <label for="penyimpanan">Penyimpanan</label>
            <input type="text" class="form-control" id="penyimpanan" name="penyimpanan" value="{{ $unit->penyimpanan }}" placeholder="Masukkan penyimpanan">
        </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $unit->status }}" placeholder="Masukkan status saat ini" required>
        </div> --}}

        {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="">Pilih Status</option>
                <option value="Belum dikonfirmasi" {{ $unit->status == 'Belum dikonfirmasi' ? 'selected' : '' }}>Belum dikonfirmasi</option>
                <option value="Konfirmasi" {{ $unit->status == 'Konfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                <option value="Selesai" {{ $unit->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div> --}}

        <div class="form-group">
            <label for="rincian">Rincian</label>
            <input type="text" class="form-control" id="rincian" name="rincian" value="{{ $unit->rincian }}" placeholder="Masukkan rincian">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-secondary">Batal</button>
        </div>
    </form>
    <script>
        const namaSelect = document.getElementById('nama');
        const tarifInput = document.getElementById('tarif');

        namaSelect.addEventListener('change', () => {
            // Ambil opsi yang dipilih
            const selectedOption = namaSelect.options[namaSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga'); // Ambil atribut data-harga

            // Tampilkan harga pada input tarif
            tarifInput.value = harga ? harga : ""; // Kosongkan jika tidak ada harga
        });
    </script>
</div>
@endsection
