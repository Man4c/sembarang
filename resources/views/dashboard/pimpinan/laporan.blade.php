@extends('layouts.laporan')
@section('laporan_content')

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
                    <a href="{{ route('laporan') }}" class="active">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h3>Laporan</h3>
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
            <h2>Laporan</h2>
            <div class="profile">
                <div class="sapa">
                    <p class="top">Hey, <span>{{ Auth::user()->name }}</span></p>
                    <p class="role">Pimpinan</p>
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
                        <h3>Daftar Laporan</h3>
                    </div>

                    <div class="search-add-container">
                        <!-- Form Filter -->
                        <form action="{{ route('laporan') }}" method="GET" class="form-groupp">
                            <select name="filter" id="filter" class="form-select">
                                <option value="" {{ request('filter') == '' ? 'selected' : '' }}>Semua Tanggal</option>
                                <option value="Hari ini" {{ request('filter') == 'Hari ini' ? 'selected' : '' }}>Hari ini</option>
                                <option value="Minggu ini" {{ request('filter') == 'Minggu ini' ? 'selected' : '' }}>Minggu ini</option>
                                <option value="Bulan ini" {{ request('filter') == 'Bulan ini' ? 'selected' : '' }}>Bulan ini</option>
                                <option value="Tahun ini" {{ request('filter') == 'Tahun ini' ? 'selected' : '' }}>Tahun ini</option>
                            </select>

                            <div class="me-2">
                                <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" placeholder="Tanggal Mulai">
                            </div>
                            <div class="me-2">
                                <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" placeholder="Tanggal Akhir">
                            </div>

                            <button type="submit">Filter</button>
                        </form>

                        <!-- Cetak PDF Button -->
                        <a href="{{ route('laporan.cetak', ['filter' => request('filter'), 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn-add">Cetak PDF</a>

                    </div>
                </div>
                <div class="table-container">
                    <div class="form-scroll" style="max-height: 570px; overflow-y: auto;">
                        <table>
                            <thead style="position: sticky; top: 0; background-color: white; z-index: 1;">
                                <tr>
                                    <th>Id Pesanan</th>
                                    <th>Pelanggan</th>
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
                                    <td>{{ $pesanan->nama }}</td>
                                    <td>{{ $pesanan->tipe }}</td>
                                    <td>{{ $pesanan->durasi }}</td>
                                    <td>{{ $pesanan->tgl }}</td>
                                    <td>Rp. {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                                    <td class="{{ $pesanan->status == 'Pending' ? 'warning' : 'succes' }}">
                                        {{ $pesanan->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>90</td>
                                    <td>Andi</td>
                                    <td>PS 4</td>
                                    <td>2 Hari</td>
                                    <td>2022-10-10</td>
                                    <td>Rp. 200.000</td>
                                    <td class="warning">Pending</td>
                                </tr>
                                <tr>
                                    <td>90</td>
                                    <td>Andi</td>
                                    <td>PS 4</td>
                                    <td>2 Hari</td>
                                    <td>2022-10-10</td>
                                    <td>Rp. 200.000</td>
                                    <td class="warning">Pending</td>
                                </tr>
                                <tr>
                                    <td>90</td>
                                    <td>Andi</td>
                                    <td>PS 4</td>
                                    <td>2 Hari</td>
                                    <td>2022-10-10</td>
                                    <td>Rp. 200.000</td>
                                    <td class="warning">Pending</td>
                                </tr>
                                <tr>
                                    <td>90</td>
                                    <td>Andi</td>
                                    <td>PS 4</td>
                                    <td>2 Hari</td>
                                    <td>2022-10-10</td>
                                    <td>Rp. 200.000</td>
                                    <td class="warning">Pending</td>
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

<script>
    document.getElementById('print-button').addEventListener('click', function () {
        window.print();
    });
</script>


@endsection

