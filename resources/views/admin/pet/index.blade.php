<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pet</th>
                <th>Tanggal Lahir</th>
                <th>Warna Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Nama Pemilik</th>
                <th>Ras</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pet as $index => $dataPet)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataPet->nama }}</td>
                <td>{{ $dataPet->tanggal_lahir }}</td>
                <td>{{ $dataPet->warna_tanda }}</td>
                <td>{{ $dataPet->jenis_kelamin }}</td>
                <td>{{ $dataPet->pemilik->user->nama }}</td>
                <td>{{ $dataPet->rasHewan->nama_ras}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>