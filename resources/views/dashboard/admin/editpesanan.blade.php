@extends('layouts.editpesanan')

@section('editpesanan_content')
<div class="container">
    <div class="form-header">
        <h1>Form Edit Pesanan</h1>
        <p>Silakan isi data dengan lengkap dan benar</p>
    </div>

    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pesanan->nama }}" placeholder="Masukkan nama pelanggan" readonly required>
        </div>

        {{-- <div class="form-group">
            <label for="tipe">Tipe Playstation</label>
            <select class="form-control" id="tipe" name="tipe" value="{{ $pesanan->tipe }}" required>
                <option value="" data-harga="">Pilih Tipe PS</option>
                <option value="Play Station 1" data-harga="10000">Play Station 1 - Rp 10.000</option>
                <option value="Play Station 2" data-harga="15000">Play Station 2 - Rp 15.000</option>
                <option value="Play Station 3" data-harga="20000">Play Station 3 - Rp 20.000</option>
                <option value="Play Station 4" data-harga="25000">Play Station 4 - Rp 25.000</option>
                <option value="Play Station 5" data-harga="30000">Play Station 5 - Rp 30.000</option>
            </select>
        </div> --}}

        <div class="form-group">
            <label for="tipe">Tipe Playstation</label>
            <select class="form-control" id="tipe" name="tipe">
                <option value="">Pilih Tipe PS</option>
                <option value="Play Station 1" data-harga="30000" {{ $pesanan->tipe == 'Play Station 1' ? 'selected' : '' }}>Play Station 1 - Rp 30.000</option>
                <option value="Play Station 2" data-harga="40000" {{ $pesanan->tipe == 'Play Station 2' ? 'selected' : '' }}>Play Station 2 - Rp 40.000</option>
                <option value="Play Station 3" data-harga="70000" {{ $pesanan->tipe == 'Play Station 3' ? 'selected' : '' }}>Play Station 3 - Rp 70.000</option>
                <option value="Play Station 4" data-harga="90000" {{ $pesanan->tipe == 'Play Station 4' ? 'selected' : '' }}>Play Station 4 - Rp 90.000</option>
                <option value="Play Station 5" data-harga="100000" {{ $pesanan->tipe == 'Play Station 5' ? 'selected' : '' }}>Play Station 5 - Rp 100.000</option>
            </select>
        </div>

        <div class="form-group">
            <label for="durasi">Durasi Sewa</label>
            <select class="form-control" id="durasi" name="durasi">
                <option value="" selected>Pilih Durasi Sewa</option>
                <option value="1" {{ $pesanan->durasi == '1' ? 'selected' : '' }}>1 Hari</option>
                <option value="2" {{ $pesanan->durasi == '2' ? 'selected' : '' }}>2 Hari</option>
                <option value="3" {{ $pesanan->durasi == '3' ? 'selected' : '' }}>3 Hari</option>
                <option value="4" {{ $pesanan->durasi == '4' ? 'selected' : '' }}>4 Hari</option>
                <option value="5" {{ $pesanan->durasi == '5' ? 'selected' : '' }}>5 Hari</option>
                <option value="6" {{ $pesanan->durasi == '6' ? 'selected' : '' }}>6 Hari</option>
                <option value="7" {{ $pesanan->durasi == '7' ? 'selected' : '' }}>7 Hari</option>
            </select>
        </div>

        {{-- <div class="form-group">
            <label for="mulai">Waktu Mulai</label>
            <input type="time" class="form-control" id="mulai" name="mulai" value="{{ $pesanan->mulai }}" placeholder="Masukkan total mulai" required>
        </div>

        <div class="form-group">
            <label for="selesai">Waktu Selesai</label>
            <input type="time" class="form-control" id="selesai" name="selesai" value="{{ $pesanan->selesai }}" placeholder="Masukkan waktu selesai" required>
        </div> --}}

        <div class="form-group">
            <label for="tgl">Tanggal</label>
            <input type="date" class="form-control" id="tgl" name="tgl" value="{{ $pesanan->tgl }}" placeholder="Masukkan tanggal">
        </div>

        <div class="form-group">
            <label for="total">Total Tarif</label>
            <input type="number" class="form-control" id="total" name="total" value="{{ $pesanan->total }}" placeholder="Masukkan total tarif">
        </div>

        {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" value="{{ $pesanan->status }}" required>
                <option value="" data-harga="">Pilih Status</option>
                <option value="Ditolak" >Ditolak</option>
                <option value="Diterima" >Diterima</option>
                <option value="Selesai" >Selesai</option>
            </select>
        </div> --}}

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="">Pilih Status</option>
                <option value="Belum dikonfirmasi" value="{{ $pesanan->status }}" {{ $pesanan->status == 'Belum dikonfirmasi' ? 'selected' : '' }}>Belum dikonfirmasi</option>
                <option value="Dikonfirmasi" value="{{ $pesanan->status }}" {{ $pesanan->status == 'Dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary">Batal</button>
        </div>
    </form>
    <script>
        const namaSelect = document.getElementById('tipe');
        const tarifInput = document.getElementById('total');

        namaSelect.addEventListener('change', () => {
            // Ambil opsi yang dipilih
            const selectedOption = namaSelect.options[namaSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga'); // Ambil atribut data-harga

            // Tampilkan harga pada input tarif
            tarifInput.value = harga ? harga : ""; // Kosongkan jika tidak ada harga
        });

        // PERPADUAN HARGA PS & DURASI SEWA
        document.getElementById('tipe').addEventListener('change', hitungTotal);
        document.getElementById('durasi').addEventListener('change', hitungTotal);

        function hitungTotal() {
            const tipeSelect = document.getElementById('tipe');
            const durasiSelect = document.getElementById('durasi');
            const tarifInput = document.getElementById('total');

            // Ambil harga per hari dari opsi tipe PS yang dipilih
            const selectedOption = tipeSelect.options[tipeSelect.selectedIndex];
            const hargaPerHari = parseInt(selectedOption.getAttribute('data-harga')) || 0; // Ambil harga atau 0 jika tidak ada

            // Ambil durasi sewa dari select option
            const durasi = parseInt(durasiSelect.value) || 0;

            // Hitung total tarif
            const totalTarif = hargaPerHari * durasi;

            // Tampilkan hasil perhitungan total tarif pada input
            tarifInput.value = totalTarif;
        }
    </script>
</div>
@endsection
