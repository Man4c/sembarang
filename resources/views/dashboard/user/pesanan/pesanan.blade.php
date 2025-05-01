@extends('layouts.pesanan')
@section('pesanan_content')

<div class="container">
    <div class="sidebar">
        <div class="main-sidebar">
            <div class="content">

                <div class="top">
                    <div class="logo">
                        <img src="/images/play-station.png" alt="">
                        <h2>Rental PS</h2>
                    </div>
                </div>

                <div class="main-con">
                    <a href="{{ route('udashboard') }}">
                        <i class="fa-solid fa-house"></i>
                        <h3>Dashboard</h3>
                    </a>
                    <a href="{{ route('uunitps') }}">
                        <i class="fa-brands fa-playstation"></i>
                        <h3>Unit PS</h3>
                    </a>
                    <a href="{{ route('upesanan') }}" class="active">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h3>Pesanan</h3>
                    </a>
                </div>

            </div>
        </div>
        <div class="btn-logout">
            <div class="container-a">
                <a href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <h4><a href="/logout">Logout</a></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <h2>Pesanan</h2>
            <div class="profile">
                <div class="sapa">
                    <p class="top">Hey, <span>{{ Auth::user()->name }}</span></p>
                    <p class="role">User</p>
                </div>
                <div class="foto-profil">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <div class="main-body">

            <div class="main-riwayat">
                <div class="pembungkus">
                    @if(session('error'))
                        <div style="padding: 30px; background-color: #ff0000">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="form-header">
                        <h1>Form Pesan PS</h1>
                        <p>Silakan isi data dengan lengkap dan benar</p>
                    </div>

                    <div class="form-scroll" style="max-height: 426px; overflow-y: auto;">
                        <form action="{{ route('pelanggan.submitu') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="nama" name="nama" placeholder="Masukkan nama pelanggan" readonly required>
                            </div>

                            <div class="form-group">
                                <label for="tipe">Tipe Playstation</label>
                                <select class="form-control" id="tipe" name="tipe" required>
                                    <option value="" data-harga="">Pilih Tipe PS</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->nama }}" data-harga="{{ $unit->tarif }}" >{{ $unit->nama }} - Stok sisa {{ $unit->stok }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="durasi">Durasi Sewa</label>
                                <select class="form-control" id="durasi" name="durasi" required>
                                    <option value="" selected>Pilih Durasi Sewa</option>
                                    <option value="1">1 Hari</option>
                                    <option value="2">2 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="4">4 Hari</option>
                                    <option value="5">5 Hari</option>
                                    <option value="6">6 Hari</option>
                                    <option value="7">7 Hari</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukkan tanggal" required>
                            </div>

                            <div class="form-group">
                                <label for="total">Total Tarif</label>
                                <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan total tarif" required>
                            </div>

                            <div class="form-group" style="display: none">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Belum dikonfirmasi" >Belum dikonfirmasi</option>
                                </select>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection
