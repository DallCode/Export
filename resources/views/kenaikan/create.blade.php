<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Kenaikan</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Edit Kenaikan</h2>
        <form action="{{ route('kenaikan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_siswa">ID Siswa</label>
                <input type="text" class="form-control" name="id_siswa" id="id_siswa" required>
            </div>
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran</label>
                <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran"  required>
            </div>
            <div class="form-group">
                <label for="kelas_asal">Kelas Asal</label>
                <input type="text" class="form-control" name="kelas_asal" id="kelas_asal"  required>
            </div>
            <div class="form-group">
                <label for="kelas_tujuan">Kelas Tujuan</label>
                <input type="text" class="form-control" name="kelas_tujuan" id="kelas_tujuan"  required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('kenaikan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
