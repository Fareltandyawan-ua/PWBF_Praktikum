<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index => $dataKategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dataKategori->nama_kategori }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>