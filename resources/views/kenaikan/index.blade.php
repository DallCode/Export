<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Kenaikan</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Data Kenaikan</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <a href="{{ route('kenaikan.create') }}" class="btn btn-primary mb-3">Tambah Kenaikan</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Siswa</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas Asal</th>
                    <th>Kelas Tujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kenaikan as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->id_siswa }}</td>
                        <td>{{ $k->tahun_ajaran }}</td>
                        <td>{{ $k->kelas_asal }}</td>
                        <td>{{ $k->kelas_tujuan }}</td>
                        <td>
                            <a href="{{ route('kenaikan.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kenaikan.destroy', $k->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
