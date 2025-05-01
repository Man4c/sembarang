<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Hasil</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nilai Hadir</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Project</th>
                    <th>Total</th>
                    <th>Huruf</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($hasil as $data)
                    <tr>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>{{ $data->nilai }}</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</body>
</html>
