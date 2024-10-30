<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Kenaikan</title>

    <style>
    table {
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 5px;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID Siswa</th>
                <th>Tahun Ajaran</th>
                <th>Kelas Asal</th>
                <th>Kelas Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kenaikan as $k)
            <tr>
                <td>{{ $k->id_siswa }}</td>
                <td>{{ $k->tahun_ajaran }}</td>
                <td>{{ $k->kelas_asal }}</td>
                <td>{{ $k->kelas_tujuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
