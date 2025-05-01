@extends('layouts.editpelanggan')

@section('editpelanggan_content')
<div class="container">
    <div class="form-header">
        <h1>Form Edit Data</h1>
        <p>Silakan isi data dengan lengkap dan benar</p>
    </div>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" placeholder="Masukkan nama pelanggan">
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="number" class="form-control" id="kontak" name="kontak" value="{{ $pelanggan->kontak }}" placeholder="Masukkan nomor hp" step="0.01">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}" placeholder="Masukkan alamat">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-secondary">Batal</button>
        </div>
    </form>
</div>
@endsection
