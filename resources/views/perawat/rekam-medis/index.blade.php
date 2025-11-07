<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Anamnesa</th>
                <th>Temuan Klinis</th>
                <th>Diagnosa</th>
                <th>Dokter Pemeriksa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekamMedis as $index => $dataRekamMedis)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{  }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('perawat.dashboard-perawat') }}">Kembali</a>
</body>
</html>