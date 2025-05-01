@extends('layouts.pelanggan')
@section('pelanggan_content')

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
                    {{-- <a href="{{ route('upelanggan') }}" class="active">
                        <i class="fa-solid fa-users"></i>
                        <h3>Pelanggan</h3> --}}
                    </a>
                    <a href="{{ route('uunitps') }}">
                        <i class="fa-brands fa-playstation"></i>
                        <h3>Unit PS</h3>
                    </a>
                    <a href="{{ route('upesanan') }}">
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
                    <h3><a href="/logout">Logout</a></h3>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <h2>Pelanggan</h2>
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
                <div class="body-top">

                    <div class="judul">
                        <h3>Daftar Pelanggan</h3>
                    </div>

                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Id Pelanggan</th>
                                <th>Pelanggan</th>
                                <th>Kontak</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

