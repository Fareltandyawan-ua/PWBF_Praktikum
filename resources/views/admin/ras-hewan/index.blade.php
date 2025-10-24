<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ras Hewan</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ras</th>
                <th>Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rasHewan as $index => $dataRasHewan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataRasHewan->nama_ras}}</td>
                <td>{{ $dataRasHewan->jenis->nama_jenis_hewan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>