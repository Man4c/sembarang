<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Rental PlayStation</h1>
    <p>Filter: {{ $date }}</p>
    @if(!empty($startDate) && !empty($endDate))
        Rentang Tanggal: {{ $startDate }} sampai {{ $endDate }}
    @endif
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
                    <td>{{ $pesanan->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pesanan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
