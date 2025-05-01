@extends('layouts.unitps')
@section('unitps_content')

<div class="container">
    <div class="sidebar">
        <div class="main-sidebar">
            <div class="content">
                <div class="top">
                    <div class="logo">
                        <img src="/images/play-station.png" alt="" />
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
                    <a href="{{ route('unitps') }}" class="active">
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
            <h2>Unit PS</h2>
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
                        <h3>Daftar Unit PS</h3>
                    </div>
                    <div class="search-add-container">
                        <form action="/unit/search" method="GET" class="form-search">
                            <input type="search" name="search" placeholder="Cari pesanan...">
                            <button type="submit">Cari</button>
                        </form>

                        <!-- Cetak PDF Button -->
                        <a href="{{ route('unit.cetak', ['filter' => request('filter')]) }}" class="btn-cetak">Cetak PDF</a>

                        <div class="btn-add">
                            <a href="{{ route('unit.tambah') }}">Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Id Ps</th>
                                <th>Gambar PS</th>
                                <th>Tipe Playstation</th>
                                <th>Kontroller</th>
                                <th>Tarif /Hari</th>
                                <th>Stok</th>
                                <th>Penyimpanan</th>
                                <th>Rincian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                {{-- <td>{{ $data->gambar }}</td> --}}
                                <td><img class="image-profile" src="{{ asset($data->gambar) }}" style="height: 40px; width:40px;" alt=""></td>
                                {{-- <img class="image-profile" src="{{ asset($data->gambar) }}" alt=""> --}}
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kontroller }}</td>
                                {{-- <td>{{ $data->tarif }}</td> --}}
                                <td>Rp. {{ number_format($data->tarif, 0, ',', '.') }}</td>
                                <td>{{ $data->stok }}</td>
                                {{-- <td>{{ $data->status }}</td> --}}
                                <td>{{ $data->penyimpanan }}</td>
                                <td>{{ $data->rincian }}</td>
                                <td class="warning">
                                    <form action="{{ route('unit.delete', $data->id) }}" method="post">
                                        @csrf
                                        <a href="#" class="btn-delete" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                                    </form>
                                </td>
                                <td class="primary">
                                    <a href="{{ route('unit.edit', $data->id) }}">Edit</a>
                                </td>

                            </tr>
                            @endforeach

                            {{-- <tr>
                                <td>1</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rina Kurniawati</td>
                                <td>085678123456</td>
                                <td>Jl. Anggrek No. 45, Bogor</td>
                                <td>15-01-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Ahmad Setiawan</td>
                                <td>081234567890</td>
                                <td>Jl. Merdeka No. 12, Depok</td>
                                <td>01-11-2024</td>
                                <td class="warning"><a href="#">Delete</a></td>
                                <td class="primary"><a href="#">Edit</a></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
