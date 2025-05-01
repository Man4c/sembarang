<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Input Nilai</h2>
        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>

            <div class="mb-3">
                <label for="">Jenis</label>
                <select name="jenis" id="">
                <option value="">--Pilih Jenis--</option>
                <option value="kehadiran">Kehadiran</option>
                <optgroup label="Tugas">
                    <option value="t1">T1 (Tugas 1)</option>
                    <option value="t2">T2 (Tugas 2)</option>
                    <option value="t3">T3 (Tugas 3)</option>
                    <option value="t4">T4 (Tugas 4)</option>
                    <option value="t5">T5 (Tugas 5)</option>
                    <option value="t6">T6 (Tugas 6)</option>
                </optgroup>
                <optgroup label="Respon">
                    <option value="r1">R1 (Respon 1)</option>
                    <option value="r2">R2 (Respon 2)</option>
                    <option value="r3">R3 (Respon 3)</option>
                    <option value="r4">R4 (Respon 4)</option>
                    <option value="r5">R5 (Respon 5)</option>
                </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
