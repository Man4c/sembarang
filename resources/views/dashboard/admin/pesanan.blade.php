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
                    <a href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-house"></i>
                        <h3>Dashboard</h3>
                    </a>
                    <a href="{{ route('pelanggan') }}">
                        <i class="fa-solid fa-users"></i>
                        <h3>Pelanggan</h3>
                    </a>
                    <a href="{{ route('unitps') }}">
                        <i class="fa-brands fa-playstation"></i>
                        <h3>Unit PS</h3>
                    </a>
                    <a href="{{ route('pesanan') }}" class="active">
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
                    <p class="role">Admin</p>
                </div>
                <div class="foto-profil">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <div class="main-body">
            <div class="main-riwayat">
                <div class="body-top">

                    <div class="judul">
                        <h3>Daftar Pesanan</h3>
                    </div>

                    <div class="search-add-container">
                        <form action="/pesanan/search" method="GET" class="form-search">
                            <input type="search" name="search" placeholder="Cari pesanan...">
                            <button type="submit">Cari</button>
                        </form>

                        <!-- Cetak PDF Button -->
                        <a href="{{ route('pesanan.cetak') }}" target="_blank" class="btn-cetak">Cetak PDF</a>


                        <div class="btn-add">
                            <a href="{{ route('pesanan.tambah') }}">Tambah Data</a>
                        </div>
                    </div>

                </div>

                <div class="table-container">
                    <div class="form-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Tipe Playstation</th>
                                    <th>Durasi Sewa</th>
                                    <th>Tanggal</th>
                                    <th>Total Tarif</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->tipe }}</td>
                                    <td>{{ $data->durasi }} hari</td>
                                    <td>{{ $data->tgl }}</td>
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    {{-- <td>{{ $data->total }}</td> --}}
                                    <td>{{ $data->status }}</td>
                                    <td class="warning">
                                        <form action="{{ route('pesanan.delete', $data->id) }}" method="post">
                                            @csrf
                                            <a href="#" class="btn-delete" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                        </form>
                                    </td>
                                    <td class="primary">
                                        <a href="{{ route('pesanan.edit', $data->id) }}">Edit</a>
                                    </td>
                                    <td class="primary">
                                        @if ($data->status === 'Dikonfirmasi')
                                            <span class="btn-disabled" style="color: rgb(255, 255, 255);">Dikonfirmasi</span>
                                        @else
                                            <a href="{{ route('pesanan.konfirmasi', $data->id) }}">Konfirmasi</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const konfirmasiButtons = document.querySelectorAll('.btn-konfirmasi');

    konfirmasiButtons.forEach(button => {
        button.addEventListener('click', function () {
            const pesananId = this.getAttribute('data-id');

            if (confirm('Apakah Anda yakin ingin mengonfirmasi pesanan ini?')) {
                fetch(`/pesanan/konfirmasi/${pesananId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        // Perbarui status di tabel secara langsung
                        const row = this.closest('tr');
                        row.querySelector('td:nth-child(8)').textContent = 'Dikonfirmasi';

                        // Hapus tombol setelah konfirmasi
                        this.remove();
                    } else {
                        alert('Gagal mengonfirmasi pesanan.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, silakan coba lagi.');
                });
            }
        });
    });
    });

</script>

@endsection
