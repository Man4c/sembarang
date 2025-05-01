@extends('layouts.editunit')

@section('editunit_content')
<div class="container">
    <div class="form-header">
        <h1>Form Tambah Unit</h1>
        <p>Silakan isi data dengan lengkap dan benar</p>
    </div>

    <form action="{{ route('unit.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Gambar PS</label>
            <input class="form-control" type="file" name="gambar" id="gambar">
            @error('gambar')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">Tipe Playstation</label>
            <select class="form-control" id="nama" name="nama">
                <option value="" data-harga="">Pilih Tipe PS</option>
                <option value="Play Station 1" data-harga="30000">Play Station 1 - Rp 30.000</option>
                <option value="Play Station 2" data-harga="40000">Play Station 2 - Rp 40.000</option>
                <option value="Play Station 3" data-harga="70000">Play Station 3 - Rp 70.000</option>
                <option value="Play Station 4" data-harga="90000">Play Station 4 - Rp 90.000</option>
                <option value="Play Station 5" data-harga="100000">Play Station 5 - Rp 100.000</option>
            </select>
            @error('nama')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="kontroller">Kontroller</label>
            <input type="number" class="form-control" id="kontroller" name="kontroller" placeholder="Masukkan jumlah kontroller">
            @error('kontroller')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tarif">Tarif /Hari</label>
            <input type="number" class="form-control" id="tarif" name="tarif" placeholder="Masukkan jumlah tarif" readonly>
            @error('tarif')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah tarif">
            @error('stok')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Masukkan status saat ini" required>
        </div> --}}

        <div class="form-group">
            <label for="penyimpanan">Penyimpanan</label>
            <input type="text" class="form-control" id="penyimpanan" name="penyimpanan" placeholder="Masukkan penyimpinan">
            @error('penyimpanan')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="rincian">Rincian</label>
            <input type="text" class="form-control" id="rincian" name="rincian" placeholder="Masukkan rincian">
            @error('rincian')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
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
