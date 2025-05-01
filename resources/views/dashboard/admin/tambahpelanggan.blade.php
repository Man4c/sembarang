@extends('layouts.tambahpelanggan')

@section('tambahpelanggan_content')
<div class="container">
    <div class="form-header">
        <h1>Form Tambah Data</h1>
        <p>Silakan isi data dengan lengkap dan benar</p>
    </div>

    <form action="{{ route('pelanggan.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pelanggan">
            @error('nama')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="number" class="form-control" id="kontak" name="kontak" placeholder="Masukkan nomor hp" step="0.01">
            @error('kontak')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
            @error('alamat')
                <p style="color: red; font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary">Batal</button>
        </div>
    </form>
</div>
@endsection
