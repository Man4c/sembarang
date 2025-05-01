@extends('layouts.unitps')
@section('unitps_content')

{{-- {{ dd($unit) }} --}}
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
                    <a href="{{ route('uunitps') }}" class="active">
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
                    <h4><a href="/logout">Logout</a></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <h2>Unit PS</h2>
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
                <div class="form-scroll">
                    <!-- Konten Unit PS -->
                <div class="unit-container">
                    @foreach ($unit as $data)
                    <div class="unit-card">
                        <img src="{{ asset( $data->gambar ) }}">
                        <h3>{{ $data->nama }}</h3>
                        <p><b>Kontroller:</b> {{ $data->kontroller }}</p>
                        <p><b>Tarif /Hari:</b> {{ $data->tarif }}</p>
                        <p><b>Stok:</b> {{ $data->stok }}</p>
                        <p><b>Penyimpanan:</b> {{ $data->penyimpanan }}</p>
                        <p><b>Rincian:</b> {{ $data->rincian }}</p>
                        {{-- <p>Kapasitas: 200GB<br>Kontroler: 1</p> --}}

                        <a href="#" class="btn">Lihat Detail</a>
                    </div>
                    @endforeach


                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

