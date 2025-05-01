<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Unit Rental PlayStation</title>
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
            table-layout: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 80px;
            height: auto;
            display: block;
            margin: auto;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Unit Rental PlayStation</h1>

    <table>
        <thead>
            <tr>
                <th>Id PS</th>
                <th>Gambar PS</th>
                <th>Tipe PlayStation</th>
                <th>Kontroller</th>
                <th>Tarif /Hari</th>
                <th>Stok</th>
                <th>Penyimpanan</th>
                <th>Rincian</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($units as $unit)
                <tr>
                    <td>{{ $unit->id }}</td>
                    <td><img src="{{ $unit->gambar }}" alt="Gambar PS"></td>
                    <td>{{ $unit->nama }}</td>
                    <td>{{ $unit->kontroller }}</td>
                    <td>Rp {{ number_format($unit->tarif, 0, ',', '.') }}</td>
                    <td>{{ $unit->stok }}</td>
                    <td>{{ $unit->penyimpanan }}</td>
                    <td>{{ $unit->rincian }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data unit.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
