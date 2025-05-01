@extends('layouts.dashboard')
@section('dashboard_content')

{{-- {{ dd($riwayatPesanan) }} --}}

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
                    <a href="/dashboard" class="active">
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
                    <a href="{{ route('pesanan') }}">
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
            <h2>Dashboard Informasi</h2>
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
            <div class="tot-unit">
                <div class="unit-content">
                    <div class="text">
                        <h4>Total Pelanggan</h4>
                        <p>{{ $totalPelanggan }}</p>
                    </div>
                    <div class="icon" style="background-color: #ffe3e3;">
                        <i class="fa-solid fa-users" style="color: #db2525;"></i>
                    </div>
                </div>
            </div>
            <div class="tot-unit">
                <div class="unit-content">
                    <div class="text">
                        <h4>Total Unit</h4>
                        <p>{{ $totalUnit }}</p>
                    </div>
                    <div class="icon" style="background-color: #f0f6ff">
                        <i class="fa-brands fa-playstation" style="color: #2664eb;"></i>
                    </div>
                </div>
            </div>

            <div class="tot-unit">
                <div class="unit-content">
                    <div class="text">
                        <h4>Total Pesanan</h4>
                        <p>{{ $totalPesanan }}</p>
                    </div>
                    <div class="icon" style="background-color: #fff4c7;">
                        <i class="fa-solid fa-bookmark" style="color: #d97707;"></i>
                    </div>
                </div>
            </div>
            <div class="main-riwayat">
                <h3>Riwayat Pesanan</h3>
                <div class="table-container">
                    <div class="form-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id Pesanan</th>
                                    <th>Tipe Playstation</th>
                                    <th>Durasi Sewa</th>
                                    <th>Tanggal</th>
                                    <th>Total Tarif</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($riwayatPesanan as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->id }}</td>
                                    <td>{{ $pesanan->tipe }}</td>
                                    <td>{{ $pesanan->durasi }}</td>
                                    {{-- <td>{{ $pesanan->mulai }}</td>
                                    <td>{{ $pesanan->selesai }}</td> --}}
                                    <td>{{ $pesanan->tgl }}</td>
                                    <td>Rp. {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                                    <td class="{{ $pesanan->status == 'Pending' ? 'warning' : 'succes' }}">
                                        {{ $pesanan->status }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data pesanan</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
