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

        <a href="{{ route('kenaikan.export') }}" class="btn btn-info mb-3 ">Export</a>

          <!-- Filter Form -->
        <form method="GET" action="{{ route('kenaikan.index') }}" class="mb-3">
            <div class="row align-items-end mb-3">
                <div class="col-md-2 mb-2">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">Pilih Status</option>
                        <option value="Naik" {{ request('status') == 'Naik' ? 'selected' : '' }}>Naik</option>
                        <option value="Tidak Naik" {{ request('status') == 'Tidak Naik' ? 'selected' : '' }}>Tidak Naik
                        </option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select name="kelas_asal" class="form-control" onchange="this.form.submit()">
                        <option value="">Pilih Kelas Asal</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ request('kelas_asal') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <select name="kelas_tujuan" class="form-control" onchange="this.form.submit()">
                        <option value="">Pilih Kelas Tujuan</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}"
                                {{ request('kelas_tujuan') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Pencarian Kenaikan -->
        <form method="GET" action="{{ route('kenaikan.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Kenaikan..."
                    value="{{ request('search') }}" oninput="this.form.submit()">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Tahun Ajaran</th>
                    <th>Kelas Asal</th>
                    <th>Kelas Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kenaikan as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->siswa->nama }}</td>
                        <td>{{ $k->tahun_ajaran }}</td>
                        <td>{{ $k->kelas_Asal->nama_kelas }}</td>
                        <td>{{ $k->kelas_Tujuan->nama_kelas }}</td>
                        <td>{{ $k->status }}</td>
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
