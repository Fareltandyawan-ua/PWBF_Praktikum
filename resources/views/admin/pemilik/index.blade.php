<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilik</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Nomer WA</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemilik as $index => $dataPemilik)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataPemilik->user->nama ?? 'user tidak ditemukan' }}</td>
                <td>{{ $dataPemilik->no_wa }}</td>
                <td>{{ $dataPemilik->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>