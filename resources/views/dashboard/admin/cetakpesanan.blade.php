<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pesanan Rental PlayStation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan Rental PlayStation</h1>

    <table>
        <thead>
            <tr>
                <th>Id Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Tipe PlayStation</th>
                <th>Durasi Sewa</th>
                <th>Tanggal</th>
                <th>Total Tarif</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->nama }}</td>
                    <td>{{ $pesanan->tipe }}</td>
                    <td>{{ $pesanan->durasi }} Jam</td>
                    <td>{{ $pesanan->tgl }}</td>
                    <td>Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                    <td>{{ $pesanan->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
